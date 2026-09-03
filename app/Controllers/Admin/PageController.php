<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\Page;

class PageController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $pages = Page::all();

        View::render('admin/pages/index', [
            'pages'     => $pages,
            'pageTitle' => 'Sayfa Yönetimi - Seyitler Kimya',
        ], 'layouts/admin');
    }

    public function edit(Request $request, string $id): void
    {
        $page = Page::findById((int)$id);
        if (!$page) {
            Session::flash('error', 'Sayfa bulunamadı.');
            Response::redirect(url('/podmin/pages'));
            return;
        }

        View::render('admin/pages/edit', [
            'page'      => $page,
            'pageTitle' => 'Sayfa Düzenle: ' . $page['title_tr'],
        ], 'layouts/admin');
    }

    public function update(Request $request, string $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız (CSRF).');
            Response::redirect(url('/podmin/pages/' . $id . '/edit'));
            return;
        }

        $page = Page::findById((int)$id);
        if (!$page) {
            Session::flash('error', 'Sayfa bulunamadı.');
            Response::redirect(url('/podmin/pages'));
            return;
        }

        $sectionsData = Page::getSectionsData($page);

        // 1. Hero / Banner
        $sectionsData['hero'] = [
            'badge'    => trim((string)$request->post('hero_badge')) ?: trim((string)$request->post('title_tr')),
            'title'    => trim((string)$request->post('hero_title')) ?: trim((string)$request->post('title_tr')),
            'subtitle' => trim((string)$request->post('hero_subtitle')) ?: trim((string)$request->post('subtitle_tr')),
        ];

        // 2. Images Handling
        $image1 = trim((string)$request->post('image_1_url'));
        $image2 = trim((string)$request->post('image_2_url'));

        if (isset($_FILES['image_1_file']) && $_FILES['image_1_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['image_1_file'], 'assets/images/pages/');
            if ($uploaded) $image1 = $uploaded;
        }
        if (isset($_FILES['image_2_file']) && $_FILES['image_2_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['image_2_file'], 'assets/images/pages/');
            if ($uploaded) $image2 = $uploaded;
        }

        $imagesList = [];
        if ($image1) $imagesList[] = ['url' => $image1, 'alt' => trim((string)$request->post('image_1_alt')) ?: $page['title_tr']];
        if ($image2) $imagesList[] = ['url' => $image2, 'alt' => trim((string)$request->post('image_2_alt')) ?: $page['title_tr']];
        if (!empty($imagesList)) {
            $sectionsData['images'] = $imagesList;
        }

        // 3. Action Buttons
        $btnTextTr = trim((string)$request->post('btn_primary_text_tr'));
        $btnUrl = trim((string)$request->post('btn_primary_url'));
        $buttons = [];
        if (!empty($btnTextTr) || !empty($btnUrl)) {
            $buttons[] = [
                'text_tr' => $btnTextTr ?: 'Detaylı Bilgi',
                'text_en' => trim((string)$request->post('btn_primary_text_en')) ?: $btnTextTr,
                'text_ar' => trim((string)$request->post('btn_primary_text_ar')) ?: $btnTextTr,
                'url'     => $btnUrl ?: '#',
                'target'  => trim((string)$request->post('btn_primary_target')) ?: '_self',
                'style'   => 'primary'
            ];
        }

        $btnSecTextTr = trim((string)$request->post('btn_sec_text_tr'));
        $btnSecUrl = trim((string)$request->post('btn_sec_url'));
        if (!empty($btnSecTextTr) || !empty($btnSecUrl)) {
            $buttons[] = [
                'text_tr' => $btnSecTextTr ?: 'İletişim',
                'text_en' => trim((string)$request->post('btn_sec_text_en')) ?: $btnSecTextTr,
                'text_ar' => trim((string)$request->post('btn_sec_text_ar')) ?: $btnSecTextTr,
                'url'     => $btnSecUrl ?: '/contact',
                'target'  => trim((string)$request->post('btn_sec_target')) ?: '_self',
                'style'   => 'secondary'
            ];
        }
        $sectionsData['buttons'] = $buttons;

        // 4. Multi-language Paragraphs
        $rawParasTr = trim((string)$request->post('content_tr'));
        if (!empty($rawParasTr)) {
            $sectionsData['paragraphs_tr'] = array_values(array_filter(array_map('trim', explode("\n\n", str_replace("\r", "", $rawParasTr)))));
        }
        $rawParasEn = trim((string)$request->post('content_en'));
        if (!empty($rawParasEn)) {
            $sectionsData['paragraphs_en'] = array_values(array_filter(array_map('trim', explode("\n\n", str_replace("\r", "", $rawParasEn)))));
        }
        $rawParasAr = trim((string)$request->post('content_ar'));
        if (!empty($rawParasAr)) {
            $sectionsData['paragraphs_ar'] = array_values(array_filter(array_map('trim', explode("\n\n", str_replace("\r", "", $rawParasAr)))));
        }

        // 5. Timeline Items (for History page)
        if ($page['slug'] === 'history' && is_array($request->post('timeline_year'))) {
            $years = $request->post('timeline_year');
            $titlesTr = $request->post('timeline_title_tr') ?? [];
            $titlesEn = $request->post('timeline_title_en') ?? [];
            $titlesAr = $request->post('timeline_title_ar') ?? [];
            $descsTr = $request->post('timeline_desc_tr') ?? [];
            $descsEn = $request->post('timeline_desc_en') ?? [];
            $descsAr = $request->post('timeline_desc_ar') ?? [];

            $timeline = [];
            foreach ($years as $idx => $year) {
                if (trim((string)$year) === '') continue;
                $timeline[] = [
                    'year'     => trim((string)$year),
                    'title_tr' => trim((string)($titlesTr[$idx] ?? '')),
                    'title_en' => trim((string)($titlesEn[$idx] ?? '')) ?: trim((string)($titlesTr[$idx] ?? '')),
                    'title_ar' => trim((string)($titlesAr[$idx] ?? '')) ?: trim((string)($titlesTr[$idx] ?? '')),
                    'desc_tr'  => trim((string)($descsTr[$idx] ?? '')),
                    'desc_en'  => trim((string)($descsEn[$idx] ?? '')) ?: trim((string)($descsTr[$idx] ?? '')),
                    'desc_ar'  => trim((string)($descsAr[$idx] ?? '')) ?: trim((string)($descsTr[$idx] ?? '')),
                ];
            }
            if (!empty($timeline)) {
                $sectionsData['timeline'] = $timeline;
            }
        }

        // Header image
        $headerImage = trim((string)$request->post('header_image'));
        if (isset($_FILES['header_image_file']) && $_FILES['header_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['header_image_file'], 'assets/images/pages/');
            if ($uploaded) $headerImage = $uploaded;
        }

        $data = [
            'title_tr'       => trim((string)$request->post('title_tr')),
            'title_en'       => trim((string)$request->post('title_en')),
            'title_ar'       => trim((string)$request->post('title_ar')),
            'subtitle_tr'    => trim((string)$request->post('subtitle_tr')),
            'subtitle_en'    => trim((string)$request->post('subtitle_en')),
            'subtitle_ar'    => trim((string)$request->post('subtitle_ar')),
            'content_tr'     => trim((string)$request->post('content_tr')),
            'content_en'     => trim((string)$request->post('content_en')),
            'content_ar'     => trim((string)$request->post('content_ar')),
            'header_image'   => $headerImage ?: ($page['header_image'] ?? ''),
            'sections_data'  => json_encode($sectionsData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'meta_title_tr'  => trim((string)$request->post('meta_title_tr')),
            'meta_title_en'  => trim((string)$request->post('meta_title_en')),
            'meta_title_ar'  => trim((string)$request->post('meta_title_ar')),
            'meta_desc_tr'   => trim((string)$request->post('meta_desc_tr')),
            'meta_desc_en'   => trim((string)$request->post('meta_desc_en')),
            'meta_desc_ar'   => trim((string)$request->post('meta_desc_ar')),
            'is_active'      => $request->post('is_active') ? 1 : 0,
            'sort_order'     => (int)($request->post('sort_order') ?? ($page['sort_order'] ?? 0)),
        ];

        Page::update((int)$id, $data);

        Session::flash('success', "'{$data['title_tr']}' sayfası başarıyla güncellendi.");
        Response::redirect(url('/podmin/pages/' . $id . '/edit'));
    }

    private function handleFileUpload(array $file, string $targetDir): ?string
    {
        $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExts, true)) {
            return null;
        }

        $fullTargetDir = BASE_PATH . '/' . trim($targetDir, '/') . '/';
        if (!is_dir($fullTargetDir)) {
            @mkdir($fullTargetDir, 0755, true);
        }

        $cleanName = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($file['name'], PATHINFO_FILENAME));
        $newFilename = $cleanName . '_' . time() . '.' . $ext;
        $destPath = $fullTargetDir . $newFilename;

        if (move_uploaded_file($file['tmp_name'], $destPath)) {
            return trim($targetDir, '/') . '/' . $newFilename;
        }

        return null;
    }
}
