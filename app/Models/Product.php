<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class Product
{
    public static function allActive(?int $categoryId = null, ?string $search = null): array
    {
        $sql = "SELECT p.*, c.name_tr as category_name_tr, c.name_en as category_name_en, c.name_ar as category_name_ar 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.is_active = 1";
        $params = [];

        if ($categoryId !== null) {
            $sql .= " AND p.category_id = :cat_id";
            $params['cat_id'] = $categoryId;
        }

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (p.title_tr LIKE :s OR p.title_en LIKE :s OR p.desc_tr LIKE :s)";
            $params['s'] = '%' . trim($search) . '%';
        }

        $sql .= " ORDER BY p.sort_order ASC, p.id ASC";

        return Database::fetchAll($sql, $params);
    }

    public static function all(): array
    {
        $sql = "SELECT p.*, c.name_tr as category_name_tr 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.sort_order ASC, p.id ASC";
        return Database::fetchAll($sql);
    }

    public static function findById(int $id): ?array
    {
        $sql = "SELECT p.*, c.name_tr as category_name_tr, c.slug as category_slug 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.id = :id LIMIT 1";
        return Database::fetchOne($sql, ['id' => $id]);
    }

    public static function findBySlug(string $slug): ?array
    {
        $sql = "SELECT p.*, c.name_tr as category_name_tr, c.name_en as category_name_en, c.name_ar as category_name_ar, c.slug as category_slug 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.slug = :slug LIMIT 1";
        return Database::fetchOne($sql, ['slug' => $slug]);
    }

    public static function getTitle(array $product): string
    {
        $lang = I18n::getLocale();
        $col = "title_{$lang}";
        return $product[$col] ?? $product['title_tr'] ?? '';
    }

    public static function getDescription(array $product): string
    {
        $lang = I18n::getLocale();
        $col = "desc_{$lang}";
        return $product[$col] ?? $product['desc_tr'] ?? '';
    }

    public static function getFeatures(array $product): array
    {
        $lang = I18n::getLocale();
        $col = "features_{$lang}";
        $raw = $product[$col] ?? $product['features_tr'] ?? '[]';

        if (is_array($raw)) {
            return $raw;
        }

        $decoded = json_decode((string)$raw, true);
        return is_array($decoded) ? $decoded : [];
    }

    public static function getGallery(array $product): array
    {
        $raw = $product['gallery_images'] ?? '[]';
        if (is_array($raw)) {
            return $raw;
        }
        $decoded = json_decode((string)$raw, true);
        return is_array($decoded) ? $decoded : [];
    }

    public static function getRelated(int $categoryId, int $excludeId, int $limit = 4): array
    {
        $sql = "SELECT * FROM products 
                WHERE category_id = :cat_id AND id != :ex_id AND is_active = 1 
                ORDER BY sort_order ASC, id ASC LIMIT {$limit}";
        return Database::fetchAll($sql, ['cat_id' => $categoryId, 'ex_id' => $excludeId]);
    }

    public static function create(array $data): int
    {
        return Database::insert('products', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('products', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('products', 'id = :id', ['id' => $id]);
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM products");
    }
}
