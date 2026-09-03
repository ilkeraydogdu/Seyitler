<?php

namespace App\Models;

use App\Core\Database;

class AdminUser
{
    public static function findByUsername(string $username): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM admin_users WHERE username = :u LIMIT 1",
            ['u' => $username]
        );
    }

    public static function findByIdentifier(string $identifier): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM admin_users WHERE username = :u OR email = :e LIMIT 1",
            ['u' => $identifier, 'e' => $identifier]
        );
    }

    public static function findByEmail(string $email): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM admin_users WHERE email = :e LIMIT 1",
            ['e' => $email]
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM admin_users WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function updateProfile(int $id, array $data): bool
    {
        return Database::update('admin_users', $data, 'id = :id', ['id' => $id]) >= 0;
    }

    public static function updatePassword(int $id, string $hashedPassword): bool
    {
        return Database::update(
            'admin_users',
            ['password' => $hashedPassword],
            'id = :id',
            ['id' => $id]
        ) > 0;
    }

    public static function all(): array
    {
        return Database::fetchAll("SELECT id, username, role, created_at FROM admin_users ORDER BY id ASC");
    }
}
