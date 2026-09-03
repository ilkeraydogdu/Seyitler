<?php

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\ContactMessage;

class ContactController
{
    public function index(Request $request): void
    {
        View::render('contact/index', [
            'pageTitle'       => __('İletişim - Seyitler Kimya', 'İletişim - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya iletişim kanalları, fabrika ve genel merkez adresi, müşteri ilişkileri formu.', 'Seyitler Kimya iletişim kanalları, fabrika ve genel merkez adresi, müşteri ilişkileri formu.'),
        ]);
    }

    public function send(Request $request): void
    {
        // 1. CSRF Doğrulaması
        $token = $request->post('_csrf_token');
        if (!Csrf::validate($token)) {
            Session::flash('error', __('Güvenlik doğrulaması başarısız oldu. Lütfen tekrar deneyiniz.', 'Güvenlik doğrulaması başarısız oldu. Lütfen tekrar deneyiniz.'));
            Response::redirect(url('/contact'));
            return;
        }

        // 2. Girdi Doğrulama
        $name    = trim((string)$request->post('name'));
        $email   = trim((string)$request->post('email'));
        $phone   = trim((string)$request->post('phone'));
        $subject = trim((string)$request->post('subject'));
        $message = trim((string)$request->post('message'));

        if ($name === '' || $email === '' || $message === '') {
            Session::flash('error', __('Lütfen ad, e-posta ve mesaj alanlarını doldurunuz.', 'Lütfen ad, e-posta ve mesaj alanlarını doldurunuz.'));
            Response::redirect(url('/contact'));
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::flash('error', __('Lütfen geçerli bir e-posta adresi giriniz.', 'Lütfen geçerli bir e-posta adresi giriniz.'));
            Response::redirect(url('/contact'));
            return;
        }

        // 3. Veritabanına Kaydet
        try {
            ContactMessage::create([
                'name'    => $name,
                'email'   => $email,
                'phone'   => $phone,
                'subject' => $subject,
                'message' => $message,
            ]);

            Session::flash('success', __('Mesajınız başarıyla iletildi. En kısa sürede sizinle iletişime geçeceğiz.', 'Mesajınız başarıyla iletildi. En kısa sürede sizinle iletişime geçeceğiz.'));
        } catch (\Throwable $e) {
            Session::flash('error', __('Mesaj gönderilirken bir hata oluştu. Lütfen doğrudan e-posta veya telefon ile ulaşınız.', 'Mesaj gönderilirken bir hata oluştu. Lütfen doğrudan e-posta veya telefon ile ulaşınız.'));
        }

        Response::redirect(url('/contact'));
    }
}
