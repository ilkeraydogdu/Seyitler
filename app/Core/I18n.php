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
        // 1. URL parametresinden dil al
        $reqLang = $_GET['lang'] ?? null;
        if ($reqLang && in_array($reqLang, self::$availableLocales, true)) {
            self::$locale = $reqLang;
            Session::set('app_locale', $reqLang);
        } elseif (Session::has('app_locale') && in_array(Session::get('app_locale'), self::$availableLocales, true)) {
            self::$locale = Session::get('app_locale');
        } else {
            self::$locale = 'tr';
        }
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
