<?php

namespace App\Models;

use App\Core\Database;
use App\Core\I18n;

class Page
{
    public static function findBySlug(string $slug): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `pages` WHERE `slug` = :slug AND `is_active` = 1 LIMIT 1");
        $stmt->execute([':slug' => $slug]);
        $page = $stmt->fetch();
        return $page ?: null;
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `pages` WHERE `id` = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $page = $stmt->fetch();
        return $page ?: null;
    }

    public static function all(bool $activeOnly = false): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM `pages`";
        if ($activeOnly) {
            $sql .= " WHERE `is_active` = 1";
        }
        $sql .= " ORDER BY `sort_order` ASC, `id` ASC";
        return $db->query($sql)->fetchAll();
    }

    public static function update(int $id, array $data): bool
    {
        $db = Database::getInstance();
        $fields = [];
        $params = [':id' => $id];

        $allowed = [
            'title_tr', 'title_en', 'title_ar',
            'subtitle_tr', 'subtitle_en', 'subtitle_ar',
            'content_tr', 'content_en', 'content_ar',
            'header_image',
            'sections_data',
            'meta_title_tr', 'meta_title_en', 'meta_title_ar',
            'meta_desc_tr', 'meta_desc_en', 'meta_desc_ar',
            'is_active',
            'sort_order'
        ];

        foreach ($allowed as $f) {
            if (array_key_exists($f, $data)) {
                $fields[] = "`$f` = :$f";
                $params[":$f"] = $data[$f];
            }
        }

        if (empty($fields)) {
            return false;
        }

        $sql = "UPDATE `pages` SET " . implode(', ', $fields) . " WHERE `id` = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function getSectionsData(array $page): array
    {
        $raw = $page['sections_data'] ?? null;
        if (empty($raw)) {
            return [];
        }
        if (is_array($raw)) {
            return $raw;
        }
        $decoded = json_decode((string)$raw, true);
        return is_array($decoded) ? $decoded : [];
    }

    public static function getHero(array $page): array
    {
        $sec = self::getSectionsData($page);
        return $sec['hero'] ?? [
            'badge' => self::getTitle($page),
            'title' => self::getTitle($page),
            'subtitle' => self::getSubtitle($page)
        ];
    }

    public static function getImages(array $page): array
    {
        $sec = self::getSectionsData($page);
        if (!empty($sec['images']) && is_array($sec['images'])) {
            return $sec['images'];
        }
        return self::getDefaultImagesForSlug($page['slug'] ?? '');
    }

    public static function getButtons(array $page): array
    {
        $sec = self::getSectionsData($page);
        return $sec['buttons'] ?? [];
    }

    public static function getVideo(array $page): array
    {
        $sec = self::getSectionsData($page);
        if (!empty($sec['video']['url'])) {
            return $sec['video'];
        }
        return self::getDefaultVideoForSlug($page['slug'] ?? '');
    }

    public static function getDocuments(array $page): array
    {
        $sec = self::getSectionsData($page);
        if (!empty($sec['documents']) && is_array($sec['documents'])) {
            return $sec['documents'];
        }
        return self::getDefaultDocumentsForSlug($page['slug'] ?? '');
    }

    public static function getDefaultImagesForSlug(string $slug): array
    {
        switch ($slug) {
            case 'about-us':
                return [
                    ['url' => 'assets/images/hakkimizda_01.webp', 'alt' => 'Tesis ve Üretim Alanı'],
                    ['url' => 'assets/images/hakkimizda_02.webp', 'alt' => 'Modern Makine Parkuru']
                ];
            case 'mission-vision':
                return [
                    ['url' => 'assets/images/misyonumuz-min.webp', 'alt' => 'Misyonumuz'],
                    ['url' => 'assets/images/vizyonumuz-min.webp', 'alt' => 'Vizyonumuz']
                ];
            case 'organization':
                return [
                    ['url' => 'assets/images/mehmet_faysal_gokalp.jpeg', 'alt' => 'Prof. Dr. Mehmet Faysal GÖKALP'],
                    ['url' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp', 'alt' => 'Yönetim ve Tesis Şeması']
                ];
            case 'sustainability':
                return [
                    ['url' => 'assets/images/surdurulebilirlik-min.webp', 'alt' => 'Sürdürülebilirlik Banner'],
                    ['url' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp', 'alt' => 'Çevreye Duyarlı Üretim']
                ];
            case 'human-resources':
                return [
                    ['url' => 'assets/images/insan_kaynaklari-min.webp', 'alt' => 'İnsan Kaynakları Politikası'],
                    ['url' => 'assets/images/Seyitker_Anasayfa_03-min.webp', 'alt' => 'Ekibimiz ve Çalışma Ortamı']
                ];
            case 'rd':
                return [
                    ['url' => 'assets/images/arge_1-min.webp', 'alt' => 'Ar-Ge Laboratuvarı'],
                    ['url' => 'assets/images/arge_2-min.webp', 'alt' => 'İnovasyon ve Test Merkezi'],
                    ['url' => 'assets/images/ArGe_01.jpg', 'alt' => 'Ar-Ge Cihaz Parkuru 1'],
                    ['url' => 'assets/images/ArGe_02.jpg', 'alt' => 'Ar-Ge Cihaz Parkuru 2'],
                    ['url' => 'assets/images/ArGe_03.jpg', 'alt' => 'Ar-Ge Cihaz Parkuru 3'],
                    ['url' => 'assets/images/ArGe_04.jpg', 'alt' => 'Ar-Ge Cihaz Parkuru 4'],
                ];
            case 'areas':
                return [
                    ['url' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp', 'alt' => 'Tesis ve Üretim Temiz Oda'],
                    ['url' => 'assets/images/uretimde_guc_kalitede_istikrar.webp', 'alt' => 'Üretimde Güç ve Kalite']
                ];
            case 'home':
                return [
                    ['url' => 'assets/images/Seyitker_Anasayfa_02-min.webp', 'alt' => 'Seyitler Kimya Anasayfa Tanıtım'],
                    ['url' => 'assets/images/Seyitker_Anasayfa_03-min.webp', 'alt' => 'Yüksek Teknoloji Üretim']
                ];
            case 'products':
                return [
                    ['url' => 'assets/images/piyasaya_sunum.webp', 'alt' => 'Ürün Kataloğu ve Piyasaya Sunum'],
                    ['url' => 'assets/images/Seyitker_Anasayfa_02-min.webp', 'alt' => 'Medikal Plasterler ve Yara Örtüleri']
                ];
            case 'investors':
                return [
                    ['url' => 'assets/images/Seyitler_Anasayfa_Hakkimizda_v2.webp', 'alt' => 'Borsa İstanbul Yatırımcı İlişkileri'],
                    ['url' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp', 'alt' => 'Şeffaf Kurumsal Yönetim']
                ];
            case 'contact':
                return [
                    ['url' => 'assets/images/Seyitler_Anasayfa_Hakkimizda_v2.webp', 'alt' => 'Manisa Turgutlu Üretim Kampüsü'],
                    ['url' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp', 'alt' => 'Genel Merkez ve Fabrika']
                ];
            default:
                return [
                    ['url' => 'assets/images/hakkimizda_01.webp', 'alt' => 'Seyitler Kimya'],
                    ['url' => 'assets/images/hakkimizda_02.webp', 'alt' => 'Üretim Tesisleri']
                ];
        }
    }

    public static function getDefaultVideoForSlug(string $slug): array
    {
        switch ($slug) {
            case 'rd':
                return [
                    'url'    => 'https://r2-content-api.okesici.workers.dev/files/photos/ArGe.mp4',
                    'poster' => 'assets/images/arge_1-min.webp',
                    'title'  => 'Seyitler Kimya Ar-Ge Laboratuvarı Tanıtım Videosu'
                ];
            case 'areas':
                return [
                    'url'    => 'https://r2-content-api.okesici.workers.dev/files/photos/FaaliyetAlanlari.mp4',
                    'poster' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp',
                    'title'  => 'Faaliyet Alanları ve Üretim Tesisimiz'
                ];
            case 'home':
            case 'about-us':
                return [
                    'url'    => 'https://r2-content-api.okesici.workers.dev/files/photos/FaaliyetAlanlari.mp4',
                    'poster' => 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp',
                    'title'  => 'Seyitler Kimya Kurumsal Tanıtım Filmi'
                ];
            default:
                return [
                    'url'    => '',
                    'poster' => '',
                    'title'  => ''
                ];
        }
    }

    public static function getDefaultDocumentsForSlug(string $slug): array
    {
        switch ($slug) {
            case 'products':
            case 'home':
            case 'about-us':
                return [
                    [
                        'title' => 'Seyitler Kimya Medikal Ürün Kataloğu (PDF)',
                        'url'   => 'assets/docs/catalog_en.pdf',
                        'size'  => '2.1 MB'
                    ]
                ];
            case 'investors':
                return [
                    [
                        'title' => '2025 Yılı 12 Aylık Faaliyet Raporu (PDF)',
                        'url'   => 'assets/documents/2025 12 Faaliyet Raporu.pdf',
                        'size'  => '1.5 MB'
                    ]
                ];
            case 'sustainability':
                return [
                    [
                        'title' => 'Sürdürülebilirlik ve Kurumsal Uyum Raporu (PDF)',
                        'url'   => 'assets/documents/2025 12 Faaliyet Raporu.pdf',
                        'size'  => '1.5 MB'
                    ]
                ];
            case 'organization':
                return [
                    [
                        'title' => 'Şirket Ana Sözleşmesi ve Yönetim Esasları (PDF)',
                        'url'   => 'assets/documents/anasozlesme2022.pdf',
                        'size'  => '655 KB'
                    ]
                ];
            case 'kvkk':
            case 'cookie-policy':
                return [
                    [
                        'title' => 'KVKK Bilgilendirme ve İlgili Kişi Başvuru Formu (PDF)',
                        'url'   => 'assets/documents/anasozlesme2022.pdf',
                        'size'  => '655 KB'
                    ]
                ];
            case 'human-resources':
                return [
                    [
                        'title' => 'İnsan Kaynakları Politikası ve Kariyer Rehberi (PDF)',
                        'url'   => 'assets/docs/catalog_en.pdf',
                        'size'  => '2.1 MB'
                    ]
                ];
            default:
                return [
                    [
                        'title' => 'Kurumsal Tanıtım Dokümanı (PDF)',
                        'url'   => 'assets/docs/catalog_en.pdf',
                        'size'  => '2.1 MB'
                    ]
                ];
        }
    }

    public static function getParagraphs(array $page): array
    {
        $locale = I18n::getLocale();
        $sec = self::getSectionsData($page);
        $key = "paragraphs_{$locale}";
        if (!empty($sec[$key]) && is_array($sec[$key])) {
            return $sec[$key];
        }
        if (!empty($sec['paragraphs_tr']) && is_array($sec['paragraphs_tr'])) {
            return $sec['paragraphs_tr'];
        }
        $content = self::getContent($page);
        if (!empty($content)) {
            return array_filter(array_map('trim', explode("\n\n", str_replace("\r", "", $content))));
        }
        return [];
    }

    public static function getTimeline(array $page): array
    {
        $sec = self::getSectionsData($page);
        return $sec['timeline'] ?? [];
    }

    public static function getValues(array $page): array
    {
        $sec = self::getSectionsData($page);
        return $sec['values'] ?? [];
    }

    public static function getTitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["title_{$locale}"] ?? $page['title_tr'] ?? '';
    }

    public static function getSubtitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["subtitle_{$locale}"] ?? $page['subtitle_tr'] ?? '';
    }

    public static function getContent(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["content_{$locale}"] ?? $page['content_tr'] ?? '';
    }

    public static function getMetaTitle(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["meta_title_{$locale}"] ?? $page['meta_title_tr'] ?? self::getTitle($page);
    }

    public static function getMetaDescription(array $page): string
    {
        $locale = I18n::getLocale();
        return $page["meta_desc_{$locale}"] ?? $page['meta_desc_tr'] ?? '';
    }
}
