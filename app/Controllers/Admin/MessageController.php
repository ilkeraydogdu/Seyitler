<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\ContactMessage;

class MessageController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $messages = ContactMessage::all();
        View::render('admin/messages/index', [
            'pageTitle' => 'Gelen Mesajlar - Seyitler Kimya',
            'messages'  => $messages,
        ], 'layouts/admin');
    }

    public function show(Request $request, int $id): void
    {
        $message = ContactMessage::findById($id);
        if (!$message) {
            Session::flash('error', 'Mesaj bulunamadı.');
            Response::redirect(url('/podmin/messages'));
            return;
        }

        if (empty($message['is_read'])) {
            ContactMessage::markAsRead($id);
            $message['is_read'] = 1;
        }

        View::render('admin/messages/show', [
            'pageTitle' => 'Mesaj: ' . ($message['name']),
            'message'   => $message,
        ], 'layouts/admin');
    }

    public function delete(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            if ($request->isAjax()) {
                Response::json(['success' => false, 'message' => 'Güvenlik doğrulaması başarısız oldu (CSRF).'], 400);
            }
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.');
            Response::redirect(url('/podmin/messages'));
            return;
        }

        try {
            $deleted = ContactMessage::delete($id);
            if ($deleted > 0) {
                if ($request->isAjax()) {
                    Response::json(['success' => true, 'message' => 'İletişim mesajı başarıyla silindi.']);
                }
                Session::flash('success', 'İletişim mesajı başarıyla silindi.');
            } else {
                if ($request->isAjax()) {
                    Response::json(['success' => false, 'message' => 'Mesaj bulunamadı veya zaten silinmiş.'], 404);
                }
                Session::flash('error', 'Mesaj silinemedi veya veritabanında bulunamadı.');
            }
        } catch (\Throwable $e) {
            error_log("[MESSAGE DELETE ERROR] " . $e->getMessage());
            if ($request->isAjax()) {
                Response::json(['success' => false, 'message' => 'Mesaj silinirken veritabanı hatası oluştu.'], 500);
            }
            Session::flash('error', 'Mesaj silinirken bir hata oluştu.');
        }

        Response::redirect(url('/podmin/messages'));
    }
}
