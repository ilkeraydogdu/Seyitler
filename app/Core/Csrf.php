<?php

namespace App\Core;

class Csrf
{
    protected const SESSION_KEY = '_csrf_token';

    public static function generateToken(): string
    {
        $token = bin2hex(random_bytes(32));
        Session::set(self::SESSION_KEY, $token);
        return $token;
    }

    public static function getToken(): string
    {
        $token = Session::get(self::SESSION_KEY);
        if (!$token) {
            $token = self::generateToken();
        }
        return $token;
    }

    public static function validate(?string $token): bool
    {
        $stored = Session::get(self::SESSION_KEY);
        if (!$stored || !$token) {
            return false;
        }
        return hash_equals($stored, $token);
    }

    public static function field(): string
    {
        $token = htmlspecialchars(self::getToken(), ENT_QUOTES, 'UTF-8');
        return '<input type="hidden" name="_csrf_token" value="' . $token . '">';
    }
}
