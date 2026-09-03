<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\AdminUser;
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
            'pageTitle' => 'Sistem, Logo & Güvenlik Ayarları - Seyitler Kimya',
            'currentUser' => Auth::user(),
        ], 'layouts/admin');
    }

    public function update(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız (CSRF).');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        // 1. Branding Files Upload (Logo, Negative Logo, Favicon)
        if (isset($_FILES['site_logo_file']) && $_FILES['site_logo_file']['error'] === UPLOAD_ERR_OK) {
            $logoPath = $this->handleFileUpload($_FILES['site_logo_file'], 'assets/images/', ['png', 'webp', 'svg', 'jpg', 'jpeg']);
            if ($logoPath) {
                SiteSetting::set('site_logo', $logoPath);
            }
        }

        if (isset($_FILES['site_logo_negative_file']) && $_FILES['site_logo_negative_file']['error'] === UPLOAD_ERR_OK) {
            $negLogoPath = $this->handleFileUpload($_FILES['site_logo_negative_file'], 'assets/images/', ['png', 'webp', 'svg', 'jpg', 'jpeg']);
            if ($negLogoPath) {
                SiteSetting::set('site_logo_negative', $negLogoPath);
            }
        }

        if (isset($_FILES['site_favicon_file']) && $_FILES['site_favicon_file']['error'] === UPLOAD_ERR_OK) {
            $favPath = $this->handleFileUpload($_FILES['site_favicon_file'], 'assets/images/', ['png', 'ico', 'webp', 'svg']);
            if ($favPath) {
                SiteSetting::set('site_favicon', $favPath);
            }
        }

        // 2. Text and URL Setting Fields
        $fields = [
            'site_title',
            'site_description',
            'site_logo',
            'site_logo_negative',
            'site_favicon',
            'company_phone',
            'company_email',
            'company_address',
            'google_maps_url',
            'social_linkedin',
            'social_instagram',
            'social_twitter',
            'banner_video_1',
            'banner_video_2',
            'banner_video_3',
            'catalog_pdf_url',
            'b2b_portal_url',
            'stat_area',
            'stat_products',
            'stat_countries',
            'meta_title',
            'meta_description',
            'google_analytics_id',
            'google_search_console_code',
        ];

        foreach ($fields as $field) {
            if ($request->post($field) !== null) {
                $val = trim((string)$request->post($field));
                // Only override if not already updated by file upload (for logo/favicon)
                if (in_array($field, ['site_logo', 'site_logo_negative', 'site_favicon']) && empty($val)) {
                    continue;
                }
                SiteSetting::set($field, $val);
            }
        }

        Session::flash('success', 'Tüm site ayarları ve kurumsal bilgiler başarıyla güncellendi.');
        Response::redirect(url('/podmin/settings'));
    }

    public function changePassword(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız (CSRF).');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        $currentUserId = Auth::id();
        if (!$currentUserId) {
            Response::redirect(url('/podmin/login'));
            return;
        }

        $user = AdminUser::findById($currentUserId);
        if (!$user) {
            Session::flash('error', 'Kullanıcı hesabı bulunamadı.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        $currentPass = (string)$request->post('current_password');
        $newPass = (string)$request->post('new_password');
        $confirmPass = (string)$request->post('new_password_confirmation');

        // Verify current password
        $isValid = false;
        if (password_verify($currentPass, $user['password']) || $user['password'] === $currentPass) {
            $isValid = true;
        }

        if (!$isValid) {
            Session::flash('error', 'Mevcut şifrenizi hatalı girdiniz.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        if (strlen($newPass) < 6) {
            Session::flash('error', 'Yeni şifre en az 6 karakter uzunluğunda olmalıdır.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        if ($newPass !== $confirmPass) {
            Session::flash('error', 'Yeni şifre ve şifre onayı birbiriyle eşleşmiyor.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        // Modern password hashing
        $hashed = password_hash($newPass, PASSWORD_DEFAULT);
        AdminUser::updatePassword($user['id'], $hashed);

        Session::flash('success', 'Yönetici giriş şifreniz güvenli bir şekilde güncellendi.');
        Response::redirect(url('/podmin/settings'));
    }

    public function updateProfile(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız (CSRF).');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        $currentUserId = Auth::id();
        if (!$currentUserId) {
            Response::redirect(url('/podmin/login'));
            return;
        }

        $user = AdminUser::findById($currentUserId);
        if (!$user) {
            Session::flash('error', 'Kullanıcı hesabı bulunamadı.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        $newUsername = trim((string)$request->post('username'));
        $newEmail = trim((string)$request->post('email'));
        $fullName = trim((string)$request->post('full_name'));
        $password = (string)$request->post('confirm_password');

        // Confirm identity with password
        if (!password_verify($password, $user['password']) && $user['password'] !== $password) {
            Session::flash('error', 'Bilgileri değiştirebilmek için geçerli yönetici şifrenizi doğru girmelisiniz.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        if (empty($newUsername) || strlen($newUsername) < 3) {
            Session::flash('error', 'Kullanıcı adı en az 3 karakter olmalıdır.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        if (!empty($newEmail) && !filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            Session::flash('error', 'Lütfen geçerli bir e-posta adresi giriniz.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        // Check if username taken by another user
        $existing = AdminUser::findByUsername($newUsername);
        if ($existing && (int)$existing['id'] !== (int)$currentUserId) {
            Session::flash('error', 'Bu kullanıcı adı başka bir hesap tarafından kullanılıyor.');
            Response::redirect(url('/podmin/settings'));
            return;
        }

        // Check if email taken by another user
        if (!empty($newEmail)) {
            $existingEmail = AdminUser::findByEmail($newEmail);
            if ($existingEmail && (int)$existingEmail['id'] !== (int)$currentUserId) {
                Session::flash('error', 'Bu e-posta adresi başka bir hesap tarafından kullanılıyor.');
                Response::redirect(url('/podmin/settings'));
                return;
            }
        }

        AdminUser::updateProfile($currentUserId, [
            'username' => $newUsername,
            'email' => $newEmail ?: null,
            'full_name' => $fullName ?: 'Yönetici'
        ]);

        // Refresh session
        $updatedUser = AdminUser::findById($currentUserId);
        unset($updatedUser['password']);
        Session::set('_auth_admin_user', $updatedUser);

        Session::flash('success', 'Yönetici giriş bilgileriniz (kullanıcı adı & e-posta) başarıyla güncellendi.');
        Response::redirect(url('/podmin/settings'));
    }

    private function handleFileUpload(array $file, string $targetDir, array $allowed = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'ico']): ?string
    {
        return \App\Core\FileUploader::uploadImage($file, $targetDir, $allowed);
    }
}
