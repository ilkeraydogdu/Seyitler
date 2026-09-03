<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class SiteSetting
{
    protected static ?array $cache = null;

    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM site_settings ORDER BY id ASC");
    }

    protected static function loadCache(): void
    {
        if (self::$cache === null) {
            self::$cache = [];
            try {
                $rows = self::all();
                foreach ($rows as $row) {
                    self::$cache[$row['setting_key']] = $row;
                }
            } catch (\Throwable $e) {
                self::$cache = [];
            }
        }
    }

    public static function get(string $key, string $default = ''): string
    {
        self::loadCache();

        if (!isset(self::$cache[$key])) {
            return $default;
        }

        $lang = I18n::getLocale();
        $col = "setting_value_{$lang}";

        if (!empty(self::$cache[$key][$col])) {
            return (string) self::$cache[$key][$col];
        }

        return (string) (self::$cache[$key]['setting_value_tr'] ?? $default);
    }

    public static function getRaw(string $key): ?array
    {
        self::loadCache();
        return self::$cache[$key] ?? null;
    }

    public static function set(string $key, array $values): void
    {
        self::loadCache();

        $existing = Database::fetchOne("SELECT id FROM site_settings WHERE setting_key = :k LIMIT 1", ['k' => $key]);

        $data = [
            'setting_value_tr' => $values['setting_value_tr'] ?? '',
            'setting_value_en' => $values['setting_value_en'] ?? '',
            'setting_value_ar' => $values['setting_value_ar'] ?? '',
        ];

        if ($existing) {
            Database::update('site_settings', $data, 'id = :id', ['id' => $existing['id']]);
        } else {
            $data['setting_key'] = $key;
            Database::insert('site_settings', $data);
        }

        self::$cache = null;
    }
}
