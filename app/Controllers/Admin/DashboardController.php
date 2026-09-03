<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Core\Request;
use App\Core\View;
use App\Models\ContactMessage;
use App\Models\Product;

class DashboardController
{
    public function index(Request $request): void
    {
        Auth::requireAuth();

        $productCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM products")['c'] ?? 0);
        $categoryCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM categories")['c'] ?? 0);
        $documentCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM investor_documents")['c'] ?? 0);
        $messageCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM contact_messages")['c'] ?? 0);
        $unreadCount = ContactMessage::unreadCount();

        $recentMessages = ContactMessage::all(5);
        $recentProducts = array_slice(Product::allActive(), 0, 5);

        View::render('admin/dashboard/index', [
            'pageTitle'      => 'Kontrol Paneli - Seyitler Kimya',
            'productCount'   => $productCount,
            'categoryCount'  => $categoryCount,
            'documentCount'  => $documentCount,
            'messageCount'   => $messageCount,
            'unreadCount'    => $unreadCount,
            'recentMessages' => $recentMessages,
            'recentProducts' => $recentProducts,
        ], 'layouts/admin');
    }
}
