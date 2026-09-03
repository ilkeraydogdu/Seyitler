<?php

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\RateLimiter;
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
        // 1. Honeypot Bot Trap: Invisible input filled only by spam crawlers
        $honeypot = trim((string)$request->post('website_url_hp'));
        if ($honeypot !== '') {
            // Silently discard spam bots without leaking details
            Response::redirect(url('/contact#contact-form'));
            return;
        }

        // 2. Spam / Flood Protection (Rate Limiter: max 5 messages per 10 minutes per IP)
        if (!RateLimiter::attempt('contact_form', null, 5, 600)) {
            Session::flash('error', __('Çok fazla mesaj gönderimi yapıldı. Lütfen birkaç dakika sonra tekrar deneyiniz.', 'Çok fazla mesaj gönderimi yapıldı. Lütfen birkaç dakika sonra tekrar deneyiniz.'));
            Response::redirect(url('/contact#contact-form'));
            return;
        }

        // 3. CSRF Protection
        $token = $request->post('_csrf_token');
        if (!Csrf::validate($token)) {
            Session::flash('error', __('Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyiniz.', 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyiniz.'));
            Response::redirect(url('/contact#contact-form'));
            return;
        }

        // 4. Input Sanitization & Anti-XSS Cleaning
        $name    = strip_tags(trim((string)$request->post('name')));
        $email   = filter_var(trim((string)$request->post('email')), FILTER_SANITIZE_EMAIL);
        $phone   = strip_tags(trim((string)$request->post('phone')));
        $subject = strip_tags(trim((string)$request->post('subject')));
        $message = strip_tags(trim((string)$request->post('message')));

        // 5. Anti-Header Injection: Strip carriage returns and line feeds from single-line headers
        $name    = str_replace(["\r", "\n"], '', $name);
        $email   = str_replace(["\r", "\n"], '', (string)$email);
        $phone   = str_replace(["\r", "\n"], '', $phone);
        $subject = str_replace(["\r", "\n"], '', $subject);

        // 6. Max Length Truncation (Anti-Buffer / Anti-DoS)
        $name    = mb_substr($name, 0, 100);
        $email   = mb_substr($email, 0, 120);
        $phone   = mb_substr($phone, 0, 30);
        $subject = mb_substr($subject, 0, 150);
        $message = mb_substr($message, 0, 3000);

        // 7. Strict Validation
        if ($name === '' || $email === '' || $message === '') {
            Session::flash('error', __('Lütfen ad, e-posta ve mesaj alanlarını eksiksiz doldurunuz.', 'Lütfen ad, e-posta ve mesaj alanlarını eksiksiz doldurunuz.'));
            Response::redirect(url('/contact#contact-form'));
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::flash('error', __('Lütfen geçerli bir e-posta adresi giriniz.', 'Lütfen geçerli bir e-posta adresi giriniz.'));
            Response::redirect(url('/contact#contact-form'));
            return;
        }

        // 8. Database Insertion with Safe PDO Parameterization
        try {
            ContactMessage::create([
                'name'    => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
                'email'   => $email,
                'phone'   => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
                'subject' => htmlspecialchars($subject ?: 'Genel İletişim', ENT_QUOTES, 'UTF-8'),
                'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
            ]);

            Session::flash('success', __('Mesajınız başarıyla iletildi. Müşteri ilişkileri ekibimiz en kısa sürede sizinle iletişime geçecektir.', 'Mesajınız başarıyla iletildi. Müşteri ilişkileri ekibimiz en kısa sürede sizinle iletişime geçecektir.'));
        } catch (\Throwable $e) {
            error_log('Contact form error: ' . $e->getMessage());
            Session::flash('error', __('Mesaj gönderilirken geçici bir hata oluştu. Lütfen doğrudan e-posta veya telefon ile ulaşınız.', 'Mesaj gönderilirken geçici bir hata oluştu. Lütfen doğrudan e-posta veya telefon ile ulaşınız.'));
        }

        // Always redirect back to contact form anchor so user instantly sees notification
        Response::redirect(url('/contact#contact-form'));
    }
}
