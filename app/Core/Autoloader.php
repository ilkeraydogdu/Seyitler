<?php

namespace App\Core;

class Autoloader
{
    protected static string $baseDir = '';

    public static function register(?string $baseDir = null): void
    {
        if ($baseDir === null) {
            $baseDir = dirname(__DIR__, 2);
        }
        self::$baseDir = rtrim($baseDir, '/\\') . DIRECTORY_SEPARATOR;

        spl_autoload_register([self::class, 'loadClass']);
    }

    public static function loadClass(string $class): void
    {
        $prefix = 'App\\';

        if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
            return;
        }

        $relativeClass = substr($class, strlen($prefix));
        $file = self::$baseDir . 'app' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
