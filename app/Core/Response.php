<?php

namespace App\Core;

class Response
{
    public static function status(int $code): void
    {
        http_response_code($code);
    }

    public static function header(string $name, string $value): void
    {
        header("{$name}: {$value}");
    }

    public static function json(array $data, int $statusCode = 200): void
    {
        self::status($statusCode);
        self::header('Content-Type', 'application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    public static function redirect(string $url, int $statusCode = 302): void
    {
        self::status($statusCode);
        self::header('Location', $url);
        exit;
    }
}
