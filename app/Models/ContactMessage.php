<?php

namespace App\Models;

use App\Core\Database;

class ContactMessage
{
    public static function all(): array
    {
        return Database::fetchAll(
            "SELECT * FROM contact_messages ORDER BY created_at DESC, id DESC"
        );
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne(
            "SELECT * FROM contact_messages WHERE id = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public static function create(array $data): int
    {
        return Database::insert('contact_messages', [
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'subject'    => $data['subject'] ?? null,
            'message'    => $data['message'],
            'is_read'    => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public static function markAsRead(int $id): bool
    {
        return Database::update('contact_messages', ['is_read' => 1], 'id = :id', ['id' => $id]) > 0;
    }

    public static function delete(int $id): int
    {
        return Database::delete('contact_messages', 'id = :id', ['id' => $id]);
    }

    public static function getUnreadCount(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM contact_messages WHERE is_read = 0");
    }

    public static function unreadCount(): int
    {
        return self::getUnreadCount();
    }

    public static function count(): int
    {
        return (int) Database::fetchValue("SELECT COUNT(*) FROM contact_messages");
    }
}
