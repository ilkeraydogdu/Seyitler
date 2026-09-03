<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class Page
{
    public static function findBySlug(string $slug): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `pages` WHERE `slug` = :slug AND `is_active` = 1 LIMIT 1");
        $stmt->execute([':slug' => $slug]);
        $page = $stmt->fetch();
        return $page ?: null;
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `pages` WHERE `id` = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $page = $stmt->fetch();
        return $page ?: null;
    }

    public static function all(bool $activeOnly = false): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM `pages`";
        if ($activeOnly) {
            $sql .= " WHERE `is_active` = 1";
        }
        $sql .= " ORDER BY `id` ASC";
        return $db->query($sql)->fetchAll();
    }

    public static function update(int $id, array $data): bool
    {
        $db = Database::getInstance();
        $fields = [];
        $params = [':id' => $id];

        $allowed = [
            'title_tr', 'title_en', 'title_ar',
            'subtitle_tr', 'subtitle_en', 'subtitle_ar',
            'content_tr', 'content_en', 'content_ar',
            'header_image',
            'meta_title_tr', 'meta_title_en', 'meta_title_ar',
            'meta_desc_tr', 'meta_desc_en', 'meta_desc_ar',
            'is_active'
        ];

        foreach ($allowed as $f) {
            if (array_key_exists($f, $data)) {
                $fields[] = "`$f` = :$f";
                $params[":$f"] = $data[$f];
            }
        }

        if (empty($fields)) {
            return false;
        }

        $sql = "UPDATE `pages` SET " . implode(', ', $fields) . " WHERE `id` = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function getTitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["title_{$locale}"] ?? $page['title_tr'] ?? '';
    }

    public static function getSubtitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["subtitle_{$locale}"] ?? $page['subtitle_tr'] ?? '';
    }

    public static function getContent(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["content_{$locale}"] ?? $page['content_tr'] ?? '';
    }

    public static function getMetaTitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["meta_title_{$locale}"] ?? $page['meta_title_tr'] ?? self::getTitle($page);
    }

    public static function getMetaDescription(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["meta_desc_{$locale}"] ?? $page['meta_desc_tr'] ?? '';
    }
}
