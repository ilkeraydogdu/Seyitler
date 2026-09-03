<?php

namespace App\Core;

class Security
{
    /**
     * Send enterprise standard HTTP security headers for public pages.
     */
    public static function applyHeaders(): void
    {
        if (headers_sent()) {
            return;
        }

        // Prevent MIME type sniffing
        header('X-Content-Type-Options: nosniff');

        // Prevent Clickjacking
        header('X-Frame-Options: SAMEORIGIN');

        // Legacy XSS filter for older browsers
        header('X-XSS-Protection: 1; mode=block');

        // Referrer policy
        header('Referrer-Policy: strict-origin-when-cross-origin');

        // Restrict unnecessary browser APIs
        header('Permissions-Policy: geolocation=(), camera=(), microphone=(), payment=()');

        // Remove PHP version exposure if enabled
        if (function_exists('header_remove')) {
            header_remove('X-Powered-By');
        }
    }

    /**
     * Strictly isolate admin portal from search engines and prevent browser caching.
     * Ensures Google and other crawlers NEVER index or snippet executive pages.
     */
    public static function applyAdminHeaders(): void
    {
        if (headers_sent()) {
            return;
        }

        self::applyHeaders();

        // 1. Strict Search Engine Block (Google, Bing, Yandex, etc.)
        header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet, noimageindex, notranslate');

        // 2. Disable caching for administrative data
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0');
        header('Pragma: no-cache');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    }

    /**
     * Check administrative session idle inactivity timeout (e.g. 120 minutes).
     * If idle for too long, clear session and force re-login.
     */
    public static function checkSessionInactivity(int $maxIdleMinutes = 120): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            return true;
        }

        $now = time();
        $timeoutSeconds = $maxIdleMinutes * 60;

        if (isset($_SESSION['_admin_last_activity'])) {
            $idle = $now - (int)$_SESSION['_admin_last_activity'];
            if ($idle > $timeoutSeconds) {
                // Session expired due to inactivity
                Auth::logout();
                session_regenerate_id(true);
                return false;
            }
        }

        $_SESSION['_admin_last_activity'] = $now;
        return true;
    }

    /**
     * Sanitize general input string.
     */
    public static function clean(string $data): string
    {
        return trim(strip_tags($data));
    }
}
