<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Models\Page;

class CorporateController
{
    public function index(Request $request): void
    {
        $page = Page::findBySlug('about-us');
        View::render('corporate/index', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Hakkımızda - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya Sanayi A.Ş. kurumsal yapısı, üretim kampüsü ve tarihçesi.'),
        ]);
    }

    public function history(Request $request): void
    {
        $page = Page::findBySlug('history');
        View::render('corporate/history', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Tarihçe - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('1991 yılından günümüze Seyitler Kimya’nın gelişim yolculuğu.'),
        ]);
    }

    public function missionVision(Request $request): void
    {
        $page = Page::findBySlug('mission-vision');
        View::render('corporate/mission_vision', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Misyon ve Vizyon - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya misyon, vizyon ve kurumsal hedefleri.'),
        ]);
    }

    public function values(Request $request): void
    {
        $page = Page::findBySlug('values');
        View::render('corporate/values', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Değerlerimiz - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Güven, Kalite, Şeffaflık, Yenilik ve Sorumluluk ilkelerimiz.'),
        ]);
    }

    public function organization(Request $request): void
    {
        $page = Page::findBySlug('organization');
        View::render('corporate/organization', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Organizasyon Yapısı - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Başkanın mesajı ve Seyitler Kimya kurumsal yönetim organizasyon şeması.'),
        ]);
    }

    public function sustainability(Request $request): void
    {
        $page = Page::findBySlug('sustainability');
        View::render('corporate/sustainability', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('Sürdürülebilirlik - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya sürdürülebilirlik yaklaşımı ve çevre politikaları.'),
        ]);
    }

    public function humanResources(Request $request): void
    {
        $page = Page::findBySlug('human-resources');
        View::render('corporate/human_resources', [
            'page'            => $page,
            'pageTitle'       => $page ? Page::getMetaTitle($page) : __('İnsan Kaynakları - Seyitler Kimya'),
            'pageDescription' => $page ? Page::getMetaDescription($page) : __('Seyitler Kimya insan kaynakları politikası ve açık pozisyonlar.'),
        ]);
    }
}
