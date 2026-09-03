<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\News;

class NewsController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $newsList = News::all();
        View::render('admin/news/index', [
            'pageTitle' => 'Haber & Duyuru Yönetimi - Seyitler Kimya',
            'newsList'  => $newsList,
        ], 'layouts/admin');
    }

    public function store(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/admin/news'));
            return;
        }

        $titleTr = trim((string)$request->post('title_tr'));
        if (empty($titleTr)) {
            Session::flash('error', 'Lütfen haber başlığını giriniz.');
            Response::redirect(url('/admin/news'));
            return;
        }

        News::create([
            'title_tr'   => $titleTr,
            'title_en'   => trim((string)$request->post('title_en')) ?: $titleTr,
            'title_ar'   => trim((string)$request->post('title_ar')) ?: $titleTr,
            'link_url'   => trim((string)$request->post('link_url')),
            'sort_order' => (int)$request->post('sort_order'),
            'is_active'  => 1,
        ]);

        Session::flash('success', 'Haber başarıyla kaydedildi.');
        Response::redirect(url('/admin/news'));
    }

    public function delete(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/admin/news'));
            return;
        }

        News::delete($id);
        Session::flash('success', 'Haber silindi.');
        Response::redirect(url('/admin/news'));
    }
}
