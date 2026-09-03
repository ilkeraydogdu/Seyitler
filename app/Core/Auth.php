<?php

namespace App\Core;

use App\Models\AdminUser;

class Auth
{
    protected const SESSION_USER_KEY = '_auth_admin_user';

    public static function check(): bool
    {
        return Session::has(self::SESSION_USER_KEY);
    }

    public static function user(): ?array
    {
        return Session::get(self::SESSION_USER_KEY);
    }

    public static function id(): ?int
    {
        $user = self::user();
        return $user ? (int)$user['id'] : null;
    }

    public static function attempt(string $username, string $password): bool
    {
        $admin = AdminUser::findByUsername($username);
        if (!$admin) {
            return false;
        }

        $passwordValid = false;

        // Modern hash kontrolü
        if (password_verify($password, $admin['password'])) {
            $passwordValid = true;
        } elseif ($admin['password'] === $password) {
            // Legacy düz metin şifre tespiti: Anında modern standartta hashle ve güncelle!
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            AdminUser::updatePassword($admin['id'], $newHash);
            $passwordValid = true;
        }

        if ($passwordValid) {
            Session::regenerate();
            // Hassas alanları oturumdan çıkar
            unset($admin['password']);
            Session::set(self::SESSION_USER_KEY, $admin);
            return true;
        }

        return false;
    }

    public static function logout(): void
    {
        Session::remove(self::SESSION_USER_KEY);
        Session::regenerate();
    }

    public static function guard(string $redirectTo = '/podmin/login'): void
    {
        if (!self::check()) {
            Session::flash('error', 'Lütfen devam etmek için giriş yapınız.');
            Response::redirect(url($redirectTo));
            exit;
        }
    }

    public static function requireAuth(string $redirectTo = '/podmin/login'): void
    {
        self::guard($redirectTo);
    }
}
