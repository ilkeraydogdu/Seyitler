<?php

namespace App\Models;

use App\Core\Database;

class ProductTable
{
    public static function getByProductId(int $productId): array
    {
        return Database::fetchAll(
            "SELECT * FROM product_tables WHERE product_id = :p_id ORDER BY sort_order ASC, id ASC",
            ['p_id' => $productId]
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM product_tables WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function create(array $data): int
    {
        return Database::insert('product_tables', $data);
    }

    public static function update(int $id, array $data): int
    {
        return Database::update('product_tables', $data, 'id = :id', ['id' => $id]);
    }

    public static function delete(int $id): int
    {
        return Database::delete('product_tables', 'id = :id', ['id' => $id]);
    }

    public static function deleteByProductId(int $productId): int
    {
        return Database::delete('product_tables', 'product_id = :p_id', ['p_id' => $productId]);
    }
}
