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
            'header_image'   => trim((string)$request->post('header_image')),
            'meta_title_tr'  => trim((string)$request->post('meta_title_tr')),
            'meta_title_en'  => trim((string)$request->post('meta_title_en')),
            'meta_title_ar'  => trim((string)$request->post('meta_title_ar')),
            'meta_desc_tr'   => trim((string)$request->post('meta_desc_tr')),
            'meta_desc_en'   => trim((string)$request->post('meta_desc_en')),
            'meta_desc_ar'   => trim((string)$request->post('meta_desc_ar')),
            'is_active'      => $request->post('is_active') ? 1 : 0,
        ];

        Page::update((int)$id, $data);

        Session::flash('success', "'{$data['title_tr']}' sayfası başarıyla güncellendi.");
        Response::redirect(url('/podmin/pages'));
    }
}
