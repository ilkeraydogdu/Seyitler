<?php

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\I18n;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Models\SiteSetting;

if (!function_exists('url')) {
    function url(string $path = '/'): string
    {
        static $basePath = null;
        if ($basePath === null) {
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            $baseDir = dirname($scriptName);
            $basePath = ($baseDir === '/' || $baseDir === '\\') ? '' : str_replace('\\', '/', $baseDir);
        }

        $cleanPath = '/' . ltrim($path, '/');
        if ($cleanPath === '//') {
            $cleanPath = '/';
        }

        return rtrim($basePath . $cleanPath, '/') ?: '/';
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '//')) {
            return $path;
        }
        return url('/' . ltrim($path, '/'));
    }
}

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('__')) {
    function __(string $key, ?string $default = null): string
    {
        return I18n::trans($key, $default);
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        return Csrf::getToken();
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return Csrf::field();
    }
}

if (!function_exists('session')) {
    function session(string $key = null, $default = null)
    {
        if ($key === null) {
            return $_SESSION;
        }
        return Session::get($key, $default);
    }
}

if (!function_exists('flash')) {
    function flash(string $key, $default = null)
    {
        return Session::getFlash($key, $default);
    }
}

if (!function_exists('has_flash')) {
    function has_flash(string $key): bool
    {
        return Session::hasFlash($key);
    }
}

if (!function_exists('auth_user')) {
    function auth_user(): ?array
    {
        return Auth::user();
    }
}

if (!function_exists('is_rtl')) {
    function is_rtl(): bool
    {
        return I18n::isRtl();
    }
}

if (!function_exists('current_locale')) {
    function current_locale(): string
    {
        return I18n::getLocale();
    }
}

if (!function_exists('is_active_route')) {
    function is_active_route(string $path): bool
    {
        static $currentPath = null;
        if ($currentPath === null) {
            $req = new Request();
            $currentPath = $req->getPath();
        }

        $normalized = '/' . trim($path, '/');
        if ($normalized === '//') {
            $normalized = '/';
        }

        if ($normalized === '/') {
            return $currentPath === '/';
        }

        return str_starts_with($currentPath, $normalized);
    }
}

if (!function_exists('site_setting')) {
    function site_setting(string $key, string $default = ''): string
    {
        return SiteSetting::get($key, $default);
    }
}
