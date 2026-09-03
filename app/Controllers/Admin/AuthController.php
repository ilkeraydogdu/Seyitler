<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\RateLimiter;
use App\Core\Request;
use App\Core\Response;
use App\Core\Security;
use App\Core\Session;
use App\Core\View;

class AuthController
{
    public function login(Request $request): void
    {
        // Enforce strict noindex headers
        Security::applyAdminHeaders();

        if (Auth::check()) {
            Response::redirect(url('/podmin'));
            return;
        }

        $isLocked = RateLimiter::isLocked('admin_login');
        $retryAfter = $isLocked ? RateLimiter::retryAfter('admin_login') : 0;
        $remainingAttempts = RateLimiter::remainingAttempts('admin_login', null, 5, 900);

        View::render('admin/auth/login', [
            'pageTitle'         => 'Yönetici Girişi - Seyitler Kimya',
            'isLocked'          => $isLocked,
            'retryAfter'        => $retryAfter,
            'remainingAttempts' => $remainingAttempts,
        ], null);
    }

    public function authenticate(Request $request): void
    {
        Security::applyAdminHeaders();

        // 1. Check if currently locked out
        if (RateLimiter::isLocked('admin_login')) {
            $retryAfter = RateLimiter::retryAfter('admin_login');
            $minutes = max(1, ceil($retryAfter / 60));
            Session::flash('error', "Çok fazla başarısız giriş denemesi yapıldı. Sistem güvenliği için girişler {$minutes} dakika süreyle engellendi.");
            Response::redirect(url('/podmin/login'));
            return;
        }

        // 2. CSRF Token Validation
        $token = $request->post('_csrf_token');
        if (!Csrf::validate($token)) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu (CSRF). Lütfen formu yenileyip tekrar deneyin.');
            Response::redirect(url('/podmin/login'));
            return;
        }

        $username = trim((string)$request->post('username'));
        $password = trim((string)$request->post('password'));

        if (empty($username) || empty($password)) {
            Session::flash('error', 'Lütfen kullanıcı adı veya e-posta adresi ile şifrenizi giriniz.');
            Response::redirect(url('/podmin/login'));
            return;
        }

        // 3. Attempt Authentication
        if (Auth::attempt($username, $password)) {
            // Reset rate limiter on successful authentication
            RateLimiter::reset('admin_login');

            // Prevent session fixation
            if (session_status() === PHP_SESSION_ACTIVE) {
                session_regenerate_id(true);
            }

            // Set last activity timestamp for inactivity timeout
            $_SESSION['_admin_last_activity'] = time();

            Session::flash('success', 'Hoş geldiniz, ' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '!');
            Response::redirect(url('/podmin'));
            return;
        }

        // Failed attempt: record hit & calculate remaining attempts (5 max, 15 min lockout)
        $remaining = RateLimiter::hit('admin_login', null, 5, 900);

        if ($remaining <= 0) {
            Session::flash('error', '5 kez ardışık hatalı deneme yapıldı. Güvenliğiniz için panel girişi 15 dakika boyunca kilitlenmiştir.');
        } else {
            Session::flash('error', "Kullanıcı adı veya şifre hatalı! Kalan deneme hakkınız: {$remaining}");
        }

        Response::redirect(url('/podmin/login'));
    }

    public function logout(Request $request): void
    {
        Security::applyAdminHeaders();
        Auth::logout();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
        Session::flash('success', 'Güvenli bir şekilde oturum sonlandırıldı.');
        Response::redirect(url('/podmin/login'));
    }
}
