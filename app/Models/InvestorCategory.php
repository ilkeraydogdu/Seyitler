<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class InvestorCategory
{
    public static function all(): array
    {
        return Database::fetchAll(
            "SELECT * FROM investor_categories ORDER BY sort_order ASC, id ASC"
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM investor_categories WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function getTree(): array
    {
        $all = self::all();
        $parents = [];
        $children = [];

        foreach ($all as $item) {
            if ($item['parent_id'] === null) {
                $parents[$item['id']] = $item;
                $parents[$item['id']]['children'] = [];
            } else {
                $children[$item['parent_id']][] = $item;
            }
        }

        foreach ($children as $parentId => $subItems) {
            if (isset($parents[$parentId])) {
                $parents[$parentId]['children'] = $subItems;
            }
        }

        return array_values($parents);
    }

    public static function getName(array $category): string
    {
        $lang = I18n::getLocale();
        $col = "name_{$lang}";
        return $category[$col] ?? $category['name_tr'] ?? '';
    }

    public static function create(array $data): int
    {
        return Database::insert('investor_categories', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('investor_categories', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('investor_categories', 'id = :id', ['id' => $id]);
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM investor_categories");
    }
}
