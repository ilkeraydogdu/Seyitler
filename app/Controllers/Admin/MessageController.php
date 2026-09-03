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
            Response::redirect(url('/admin/messages'));
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
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/admin/messages'));
            return;
        }

        ContactMessage::delete($id);
        Session::flash('success', 'Mesaj silindi.');
        Response::redirect(url('/admin/messages'));
    }
}
