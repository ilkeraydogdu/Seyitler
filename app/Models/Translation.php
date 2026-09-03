<?php

namespace App\Models;

use App\Core\Database;

class Translation
{
    public static function all(): array
    {
        return Database::fetchAll(
            "SELECT * FROM translations ORDER BY id ASC"
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM translations WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function findByKey(string $phraseKey): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM translations WHERE phrase_key = :k LIMIT 1",
            ['k' => $phraseKey]
        );
    }

    public static function search(string $query = '', int $limit = 50, int $offset = 0): array
    {
        $sql = "SELECT * FROM translations";
        $params = [];

        if (trim($query) !== '') {
            $sql .= " WHERE phrase_key LIKE :q OR tr_text LIKE :q OR en_text LIKE :q OR ar_text LIKE :q";
            $params['q'] = '%' . trim($query) . '%';
        }

        $sql .= " ORDER BY id ASC LIMIT {$limit} OFFSET {$offset}";

        return Database::fetchAll($sql, $params);
    }

    public static function count(string $query = ''): int
    {
        $sql = "SELECT COUNT(*) FROM translations";
        $params = [];

        if (trim($query) !== '') {
            $sql .= " WHERE phrase_key LIKE :q OR tr_text LIKE :q OR en_text LIKE :q OR ar_text LIKE :q";
            $params['q'] = '%' . trim($query) . '%';
        }

        return (int) Database::fetchValue($sql, $params);
    }

    public static function create(array $data): int
    {
        return Database::insert('translations', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('translations', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('translations', 'id = :id', ['id' => $id]);
    }
}
