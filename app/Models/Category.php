<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class Category
{
    public static function all(): array
    {
        return Database::fetchAll(
            "SELECT * FROM categories ORDER BY sort_order ASC, id ASC"
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM categories WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function findBySlug(string $slug): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM categories WHERE slug = :slug LIMIT 1",
            ['slug' => $slug]
        );
    }

    public static function getName(array $category): string
    {
        $lang = I18n::getLocale();
        $col = "name_{$lang}";
        return $category[$col] ?? $category['name_tr'] ?? '';
    }

    public static function create(array $data): int
    {
        return Database::insert('categories', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('categories', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('categories', 'id = :id', ['id' => $id]);
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM categories");
    }
}
