<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;

class CorporateController
{
    public function index(Request $request): void
    {
        View::render('corporate/index', [
            'pageTitle'       => __('Hakkımızda - Seyitler Kimya', 'Hakkımızda - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya Sanayi A.Ş. kurumsal yapısı, üretim kampüsü ve tarihçesi.', 'Seyitler Kimya Sanayi A.Ş. kurumsal yapısı, üretim kampüsü ve tarihçesi.'),
        ]);
    }

    public function history(Request $request): void
    {
        View::render('corporate/history', [
            'pageTitle'       => __('Tarihçe - Seyitler Kimya', 'Tarihçe - Seyitler Kimya'),
            'pageDescription' => __('1991 yılından günümüze Seyitler Kimya’nın gelişim yolculuğu.', '1991 yılından günümüze Seyitler Kimya’nın gelişim yolculuğu.'),
        ]);
    }

    public function missionVision(Request $request): void
    {
        View::render('corporate/mission_vision', [
            'pageTitle'       => __('Misyon ve Vizyon - Seyitler Kimya', 'Misyon ve Vizyon - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya misyon, vizyon ve kurumsal hedefleri.', 'Seyitler Kimya misyon, vizyon ve kurumsal hedefleri.'),
        ]);
    }

    public function values(Request $request): void
    {
        View::render('corporate/values', [
            'pageTitle'       => __('Değerlerimiz - Seyitler Kimya', 'Değerlerimiz - Seyitler Kimya'),
            'pageDescription' => __('Güven, Kalite, Şeffaflık, Yenilik ve Sorumluluk ilkelerimiz.', 'Güven, Kalite, Şeffaflık, Yenilik ve Sorumluluk ilkelerimiz.'),
        ]);
    }

    public function organization(Request $request): void
    {
        View::render('corporate/organization', [
            'pageTitle'       => __('Organizasyon Yapısı - Seyitler Kimya', 'Organizasyon Yapısı - Seyitler Kimya'),
            'pageDescription' => __('Başkanın mesajı ve Seyitler Kimya kurumsal yönetim organizasyon şeması.', 'Başkanın mesajı ve Seyitler Kimya kurumsal yönetim organizasyon şeması.'),
        ]);
    }

    public function sustainability(Request $request): void
    {
        View::render('corporate/sustainability', [
            'pageTitle'       => __('Sürdürülebilirlik - Seyitler Kimya', 'Sürdürülebilirlik - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya sürdürülebilirlik yaklaşımı ve çevre politikaları.', 'Seyitler Kimya sürdürülebilirlik yaklaşımı ve çevre politikaları.'),
        ]);
    }

    public function humanResources(Request $request): void
    {
        View::render('corporate/human_resources', [
            'pageTitle'       => __('İnsan Kaynakları - Seyitler Kimya', 'İnsan Kaynakları - Seyitler Kimya'),
            'pageDescription' => __('Seyitler Kimya insan kaynakları politikası ve açık pozisyonlar.', 'Seyitler Kimya insan kaynakları politikası ve açık pozisyonlar.'),
        ]);
    }
}
