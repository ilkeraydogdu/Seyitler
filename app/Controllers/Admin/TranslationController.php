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
        $q = trim((string)$request->get('q', ''));
        if ($q !== '') {
            $translations = Translation::search($q, 200);
        } else {
            $translations = Translation::all();
        }

        View::render('admin/translations/index', [
            'pageTitle'    => 'Çeviri & Çok Dilli Sözlük - Seyitler Kimya',
            'translations' => $translations,
            'searchQuery'  => $q,
        ], 'layouts/admin');
    }

    public function update(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız (CSRF).');
            Response::redirect(url('/podmin/translations'));
            return;
        }

        $items = $request->post('items');
        if (is_array($items)) {
            foreach ($items as $id => $values) {
                Translation::update((int)$id, [
                    'tr_text' => trim((string)($values['tr_text'] ?? '')),
                    'en_text' => trim((string)($values['en_text'] ?? '')),
                    'ar_text' => trim((string)($values['ar_text'] ?? '')),
                ]);
            }
        }

        Session::flash('success', 'Çeviriler başarıyla güncellendi.');
        Response::redirect(url('/podmin/translations'));
    }
}
