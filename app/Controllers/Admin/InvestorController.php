<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\InvestorCategory;
use App\Models\InvestorDocument;

class InvestorController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $documents = InvestorDocument::all();
        $categories = InvestorCategory::all();

        View::render('admin/investors/index', [
            'pageTitle'  => 'Yatırımcı İlişkileri Dokümanları - Seyitler Kimya',
            'documents'  => $documents,
            'categories' => $categories,
        ], 'layouts/admin');
    }

    public function store(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/podmin/investors'));
            return;
        }

        $titleTr = trim((string)$request->post('title_tr'));
        $categoryId = (int)$request->post('category_id');

        if (empty($titleTr) || empty($categoryId)) {
            Session::flash('error', 'Lütfen doküman başlığını ve kategorisini seçiniz.');
            Response::redirect(url('/podmin/investors'));
            return;
        }

        $url = trim((string)$request->post('doc_url'));
        $fileSize = null;

        if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
            $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
            $ext = strtolower(pathinfo($_FILES['doc_file']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $allowed, true)) {
                $targetDir = BASE_PATH . '/assets/documents/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                $safeName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', pathinfo($_FILES['doc_file']['name'], PATHINFO_FILENAME));
                $filename = $safeName . '_' . substr(md5(uniqid()), 0, 6) . '.' . $ext;
                if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $targetDir . $filename)) {
                    $url = 'assets/documents/' . $filename;
                    $fileSize = round(filesize($targetDir . $filename) / 1024) . ' KB';
                }
            }
        }

        if (empty($url)) {
            Session::flash('error', 'Lütfen bir PDF dosyası yükleyin veya dosya yolu belirtin.');
            Response::redirect(url('/podmin/investors'));
            return;
        }

        InvestorDocument::create([
            'category_id' => $categoryId,
            'label_tr'    => $titleTr,
            'label_en'    => trim((string)$request->post('title_en')) ?: $titleTr,
            'label_ar'    => trim((string)$request->post('title_ar')) ?: $titleTr,
            'url'         => $url,
            'file_size'   => $fileSize,
            'sort_order'  => 0,
        ]);

        Session::flash('success', 'Doküman başarıyla yüklendi.');
        Response::redirect(url('/podmin/investors'));
    }

    public function delete(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/podmin/investors'));
            return;
        }

        InvestorDocument::delete($id);
        Session::flash('success', 'Doküman silindi.');
        Response::redirect(url('/podmin/investors'));
    }
}
