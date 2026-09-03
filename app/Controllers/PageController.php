<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;

class PageController
{
    public function rd(Request $request): void
    {
        View::render('pages/rd', [
            'pageTitle'       => __('Ar-Ge ve İnovasyon - Seyitler Kimya', 'Ar-Ge ve İnovasyon - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya Ar-Ge Merkezi, TÜBİTAK projeleri ve laboratuvar altyapısı.', 'Seyitler Kimya Ar-Ge Merkezi, TÜBİTAK projeleri ve laboratuvar altyapısı.'),
        ]);
    }

    public function areas(Request $request): void
    {
        View::render('pages/areas', [
            'pageTitle'       => __('Faaliyet Alanları - Seyitler Kimya', 'Faaliyet Alanları - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya küresel ihracat ağı ve medikal üretim faaliyet alanları.', 'Seyitler Kimya küresel ihracat ağı ve medikal üretim faaliyet alanları.'),
        ]);
    }

    public function kvkk(Request $request): void
    {
        View::render('pages/kvkk', [
            'pageTitle'       => 'KVKK Aydınlatma Metni - Seyitler Kimya',
            'pageDescription' => 'Seyitler Kimya Sanayi A.Ş. Kişisel Verilerin Korunması ve İşlenmesi Aydınlatma Metni.',
        ]);
    }

    public function cookiePolicy(Request $request): void
    {
        View::render('pages/cookie_policy', [
            'pageTitle'       => 'Çerez Politikası - Seyitler Kimya',
            'pageDescription' => 'Seyitler Kimya Sanayi A.Ş. Çerez Kullanım Politikası ve Tercih Yönetimi.',
        ]);
    }

    public function notFound(Request $request): void
    {
        Response::status(404);
        View::render('pages/404', [
            'pageTitle' => '404 Sayfa Bulunamadı - Seyitler Kimya',
        ]);
    }
}
