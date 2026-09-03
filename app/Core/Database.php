<?php

namespace App\Core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    protected static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $configPath = dirname(__DIR__, 2) . '/config/database.php';
            $config = file_exists($configPath) ? require $configPath : [];

            $driver    = $config['driver'] ?? 'mysql';
            $host      = $config['host'] ?? '127.0.0.1';
            $port      = $config['port'] ?? 3306;
            $database  = $config['database'] ?? 'seyitler_db';
            $charset   = $config['charset'] ?? 'utf8mb4';
            $username  = $config['username'] ?? 'root';
            $password  = $config['password'] ?? '';
            $options   = $config['options'] ?? [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $dsn = "{$driver}:host={$host};port={$port};dbname={$database};charset={$charset}";

            try {
                self::$instance = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                die("Veritabanı bağlantı hatası: " . $e->getMessage());
            }
        }

        return self::$instance;
    }

    public static function query(string $sql, array $params = []): PDOStatement
    {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function fetchOne(string $sql, array $params = []): ?array
    {
        $result = self::query($sql, $params)->fetch();
        return $result ?: null;
    }

    public static function fetchAll(string $sql, array $params = []): array
    {
        return self::query($sql, $params)->fetchAll();
    }

    public static function fetchValue(string $sql, array $params = [])
    {
        return self::query($sql, $params)->fetchColumn();
    }

    public static function insert(string $table, array $data): int
    {
        $keys = array_keys($data);
        $fields = '`' . implode('`, `', $keys) . '`';
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO `{$table}` ({$fields}) VALUES ({$placeholders})";
        self::query($sql, $data);

        return (int) self::getInstance()->lastInsertId();
    }

    public static function update(string $table, array $data, string $where, array $whereParams = []): int
    {
        $fields = [];
        $params = [];

        foreach ($data as $key => $value) {
            $fields[] = "`{$key}` = :set_{$key}";
            $params["set_{$key}"] = $value;
        }

        $fieldsSql = implode(', ', $fields);
        $sql = "UPDATE `{$table}` SET {$fieldsSql} WHERE {$where}";

        $stmt = self::query($sql, array_merge($params, $whereParams));
        return $stmt->rowCount();
    }

    public static function delete(string $table, string $where, array $whereParams = []): int
    {
        $sql = "DELETE FROM `{$table}` WHERE {$where}";
        $stmt = self::query($sql, $whereParams);
        return $stmt->rowCount();
    }

    public static function beginTransaction(): bool
    {
        return self::getInstance()->beginTransaction();
    }

    public static function commit(): bool
    {
        return self::getInstance()->commit();
    }

    public static function rollBack(): bool
    {
        return self::getInstance()->rollBack();
    }
}
