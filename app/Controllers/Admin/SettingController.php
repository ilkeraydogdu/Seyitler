<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\SiteSetting;

class SettingController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        View::render('admin/settings/index', [
            'pageTitle' => 'Site Ayarları - Seyitler Kimya',
        ], 'layouts/admin');
    }

    public function update(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/admin/settings'));
            return;
        }

        $fields = [
            'company_phone',
            'company_email',
            'company_address',
            'google_maps_url',
            'social_linkedin',
            'social_instagram',
            'social_twitter',
        ];

        foreach ($fields as $field) {
            $val = trim((string)$request->post($field));
            SiteSetting::set($field, $val);
        }

        Session::flash('success', 'Site ayarları güncellendi.');
        Response::redirect(url('/admin/settings'));
    }
}
