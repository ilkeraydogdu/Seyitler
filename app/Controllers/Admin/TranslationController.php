<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\Translation;

class TranslationController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $translations = Translation::all();
        View::render('admin/translations/index', [
            'pageTitle'    => 'Çeviri Yönetimi - Seyitler Kimya',
            'translations' => $translations,
        ], 'layouts/admin');
    }

    public function update(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/admin/translations'));
            return;
        }

        $items = $request->post('items');
        if (is_array($items)) {
            foreach ($items as $id => $values) {
                Translation::update((int)$id, [
                    'value_tr' => trim((string)($values['value_tr'] ?? '')),
                    'value_en' => trim((string)($values['value_en'] ?? '')),
                    'value_ar' => trim((string)($values['value_ar'] ?? '')),
                ]);
            }
        }

        Session::flash('success', 'Çeviriler başarıyla güncellendi.');
        Response::redirect(url('/admin/translations'));
    }
}
