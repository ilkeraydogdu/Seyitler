<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\Category;
use App\Models\Product;

class CategoryController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $categories = Category::all();
        View::render('admin/categories/index', [
            'pageTitle'  => 'Kategori Yönetimi - Seyitler Kimya',
            'categories' => $categories,
        ], 'layouts/admin');
    }

    public function store(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/categories'));
            return;
        }

        $nameTr = trim((string)$request->post('name_tr'));
        if (empty($nameTr)) {
            Session::flash('error', 'Lütfen kategori adını giriniz.');
            Response::redirect(url('/podmin/categories'));
            return;
        }

        $slug = Product::slugify($nameTr);

        Category::create([
            'slug'       => $slug,
            'name_tr'    => $nameTr,
            'name_en'    => trim((string)$request->post('name_en')) ?: $nameTr,
            'name_ar'    => trim((string)$request->post('name_ar')) ?: $nameTr,
            'sort_order' => (int)$request->post('sort_order'),
            'is_active'  => 1,
        ]);

        Session::flash('success', 'Kategori başarıyla eklendi.');
        Response::redirect(url('/podmin/categories'));
    }

    public function delete(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/podmin/categories'));
            return;
        }

        Category::delete($id);
        Session::flash('success', 'Kategori silindi.');
        Response::redirect(url('/podmin/categories'));
    }
}
