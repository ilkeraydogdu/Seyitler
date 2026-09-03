<?php

namespace App\Core;

use App\Models\Translation;

class I18n
{
    protected static string $locale = 'tr';
    protected static array $availableLocales = ['tr', 'en', 'ar'];
    protected static ?array $dictionary = null;

    public static function init(): void
    {
        // 1. Explicit URL parameter (?lang=tr|en|ar) - Highest priority
        $reqLang = $_GET['lang'] ?? null;
        if ($reqLang && in_array($reqLang, self::$availableLocales, true)) {
            self::setLocale($reqLang);
            return;
        }

        // 2. Active Session preference
        if (Session::has('app_locale') && in_array(Session::get('app_locale'), self::$availableLocales, true)) {
            self::$locale = Session::get('app_locale');
            return;
        }

        // 3. Persistent Cookie preference (Remembers user across browser restarts)
        if (isset($_COOKIE['site_locale']) && in_array($_COOKIE['site_locale'], self::$availableLocales, true)) {
            self::$locale = $_COOKIE['site_locale'];
            Session::set('app_locale', self::$locale);
            return;
        }

        // 4. Autonomous Browser & Location Language Detection via HTTP_ACCEPT_LANGUAGE
        $detectedLocale = self::detectBrowserLocale();
        self::setLocale($detectedLocale);
    }

    /**
     * Parse browser Accept-Language header to automatically detect foreign or domestic visitors
     */
    protected static function detectBrowserLocale(): string
    {
        if (empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return 'tr';
        }

        $header = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);

        // Check for Arabic language family (Middle East, Gulf, North Africa)
        if (preg_match('/(^|,)(ar|ar-[a-z]{2})(;|,|$)/', $header)) {
            return 'ar';
        }

        // Check for Turkish
        if (preg_match('/(^|,)(tr|tr-[a-z]{2})(;|,|$)/', $header)) {
            return 'tr';
        }

        // Any international visitor (en, de, fr, es, ru, etc.) defaults to English for global trade
        return 'en';
    }

    public static function getLocale(): string
    {
        return self::$locale;
    }

    public static function setLocale(string $locale): void
    {
        if (in_array($locale, self::$availableLocales, true)) {
            self::$locale = $locale;
            Session::set('app_locale', $locale);

            // Set secure persistent cookie for 1 year (SameSite=Lax, HttpOnly)
            if (!headers_sent()) {
                setcookie('site_locale', $locale, [
                    'expires'  => time() + 31536000,
                    'path'     => '/',
                    'domain'   => '',
                    'secure'   => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            }
        }
    }

    public static function isRtl(): bool
    {
        return self::$locale === 'ar';
    }

    public static function getDirection(): string
    {
        return self::isRtl() ? 'rtl' : 'ltr';
    }

    public static function getAvailableLocales(): array
    {
        return self::$availableLocales;
    }

    protected static function loadDictionary(): void
    {
        if (self::$dictionary === null) {
            self::$dictionary = [];
            try {
                $rows = Translation::all();
                foreach ($rows as $row) {
                    $key = $row['phrase_key'];
                    self::$dictionary[$key] = [
                        'tr' => $row['tr_text'],
                        'en' => $row['en_text'],
                        'ar' => $row['ar_text'],
                    ];
                }
            } catch (\Throwable $e) {
                // Veritabanı henüz yüklenmemişse boş sözlükle devam et
                self::$dictionary = [];
            }
        }
    }

    public static function trans(string $key, ?string $default = null): string
    {
        self::loadDictionary();

        $lang = self::$locale;

        if (isset(self::$dictionary[$key][$lang]) && trim((string)self::$dictionary[$key][$lang]) !== '') {
            return (string)self::$dictionary[$key][$lang];
        }

        // Çeviri yoksa varsayılan veya Türkçe karşılığı, o da yoksa anahtarın kendisi
        if ($default !== null) {
            return $default;
        }

        if (isset(self::$dictionary[$key]['tr']) && trim((string)self::$dictionary[$key]['tr']) !== '') {
            return (string)self::$dictionary[$key]['tr'];
        }

        return $key;
    }
}
