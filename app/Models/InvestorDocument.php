<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class InvestorDocument
{
    public static function all(): array
    {
        $sql = "SELECT d.*, c.name_tr as category_name_tr 
                FROM investor_documents d 
                LEFT JOIN investor_categories c ON d.category_id = c.id 
                ORDER BY d.sort_order ASC, d.id DESC";
        return Database::fetchAll($sql);
    }

    public static function getByCategory(int $categoryId): array
    {
        $sql = "SELECT * FROM investor_documents 
                WHERE category_id = :cat_id 
                ORDER BY sort_order ASC, id DESC";
        return Database::fetchAll($sql, ['cat_id' => $categoryId]);
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM investor_documents WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function getLabel(array $doc): string
    {
        $lang = I18n::getLocale();
        $col = "label_{$lang}";
        return $doc[$col] ?? $doc['label_tr'] ?? '';
    }

    public static function create(array $data): int
    {
        return Database::insert('investor_documents', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('investor_documents', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('investor_documents', 'id = :id', ['id' => $id]);
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM investor_documents");
    }
}
