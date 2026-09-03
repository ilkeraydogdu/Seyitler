<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Page;

class PageController
{
    public function rd(Request $request): void
    {
        $page = Page::findBySlug('rd');
        View::render('pages/rd', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Ar-Ge ve İnovasyon - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya Ar-Ge Merkezi, TÜBİTAK projeleri ve laboratuvar altyapısı.'),
        ]);
    }

    public function areas(Request $request): void
    {
        $page = Page::findBySlug('areas');
        View::render('pages/areas', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Faaliyet Alanları - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya küresel ihracat ağı ve medikal üretim faaliyet alanları.'),
        ]);
    }

    public function kvkk(Request $request): void
    {
        $page = Page::findBySlug('kvkk');
        View::render('pages/kvkk', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : 'KVKK Aydınlatma Metni - Seyitler Kimya',
            'pageDescription' => $page ? Page::getMetaDescription($page) : 'Seyitler Kimya Sanayi A.Ş. Kişisel Verilerin Korunması ve İşlenmesi Aydınlatma Metni.',
        ]);
    }

    public function cookiePolicy(Request $request): void
    {
        $page = Page::findBySlug('cookie-policy');
        View::render('pages/cookie_policy', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : 'Çerez Politikası - Seyitler Kimya',
            'pageDescription' => $page ? Page::getMetaDescription($page) : 'Seyitler Kimya Sanayi A.Ş. Çerez Kullanım Politikası ve Tercih Yönetimi.',
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
