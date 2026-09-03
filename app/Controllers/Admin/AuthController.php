<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;

class AuthController
{
    public function login(Request $request): void
    {
        if (Auth::check()) {
            Response::redirect(url('/admin'));
            return;
        }

        View::render('admin/auth/login', [], null);
    }

    public function authenticate(Request $request): void
    {
        $token = $request->post('_csrf_token');
        if (!Csrf::validate($token)) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/admin/login'));
            return;
        }

        $username = trim((string)$request->post('username'));
        $password = trim((string)$request->post('password'));

        if (empty($username) || empty($password)) {
            Session::flash('error', 'Lütfen kullanıcı adı ve şifrenizi giriniz.');
            Response::redirect(url('/admin/login'));
            return;
        }

        if (Auth::attempt($username, $password)) {
            Session::flash('success', 'Hoş geldiniz, ' . ($username) . '!');
            Response::redirect(url('/admin'));
            return;
        }

        Session::flash('error', 'Kullanıcı adı veya şifre hatalı.');
        Response::redirect(url('/admin/login'));
    }

    public function logout(Request $request): void
    {
        Auth::logout();
        Session::flash('success', 'Güvenli bir şekilde çıkış yapıldı.');
        Response::redirect(url('/admin/login'));
    }
}
