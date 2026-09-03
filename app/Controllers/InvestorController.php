<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Models\InvestorCategory;
use App\Models\InvestorDocument;

class InvestorController
{
    public function index(Request $request): void
    {
        $tree = InvestorCategory::getTree();
        $allDocs = InvestorDocument::all();

        // Dokümanları category_id bazında grupla
        $documentsGrouped = [];
        foreach ($allDocs as $doc) {
            $catId = (int)$doc['category_id'];
            $documentsGrouped[$catId][] = [
                'id'           => $doc['id'],
                'label'        => InvestorDocument::getLabel($doc),
                'url'          => url('/documents/' . $doc['id']),
                'download_url' => url('/documents/download/' . $doc['id']),
                'file_size'    => $doc['file_size'],
            ];
        }

        View::render('investors/index', [
            'tree'             => $tree,
            'documentsGrouped' => $documentsGrouped,
            'pageTitle'        => __('Yatırımcı İlişkileri - Seyitler Kimya', 'Yatırımcı İlişkileri - Seyitler Kimya'),
            'pageDescription'  => __('Seyitler Kimya Yatırımcı İlişkileri, Finansal Tablolar, Faaliyet Raporları, Genel Kurul ve Kurumsal Yönetim Belgeleri.', 'Seyitler Kimya Yatırımcı İlişkileri, Finansal Tablolar, Faaliyet Raporları, Genel Kurul ve Kurumsal Yönetim Belgeleri.'),
        ]);
    }
}
