<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class News
{
    public static function allActive(): array
    {
        return Database::fetchAll(
            "SELECT * FROM news WHERE is_active = 1 ORDER BY sort_order ASC, id DESC"
        );
    }

    public static function all(): array
    {
        return Database::fetchAll(
            "SELECT * FROM news ORDER BY sort_order ASC, id DESC"
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM news WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function getTitle(array $item): string
    {
        $lang = I18n::getLocale();
        $col = "title_{$lang}";
        return $item[$col] ?? $item['title_tr'] ?? '';
    }

    public static function getSummary(array $item): string
    {
        $lang = I18n::getLocale();
        $col = "summary_{$lang}";
        return $item[$col] ?? $item['summary_tr'] ?? '';
    }

    public static function getBadge(array $item): string
    {
        $lang = I18n::getLocale();
        $col = "badge_{$lang}";
        return $item[$col] ?? $item['badge_tr'] ?? '';
    }

    public static function create(array $data): int
    {
        return Database::insert('news', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('news', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('news', 'id = :id', ['id' => $id]);
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM news");
    }
}
