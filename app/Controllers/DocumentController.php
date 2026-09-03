<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\Request;
use App\Core\Response;

class DocumentController
{
    /**
     * View document securely in browser (inline).
     */
    public function show(Request $request, string $id): void
    {
        $this->serveDocument((int)$id, false);
    }

    /**
     * Download document as attachment.
     */
    public function download(Request $request, string $id): void
    {
        $this->serveDocument((int)$id, true);
    }

    /**
     * Centralized, secure document streamer.
     */
    protected function serveDocument(int $id, bool $download = false): void
    {
        if ($id <= 0) {
            Response::status(404);
            echo "Geçersiz belge ID.";
            exit;
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `investor_documents` WHERE `id` = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $doc = $stmt->fetch();

        if (!$doc) {
            Response::status(404);
            echo "Belge veritabanında bulunamadı.";
            exit;
        }

        // Clean and normalize stored URL/path
        $rawUrl = $doc['url'];
        $cleanRelPath = ltrim(str_replace(['../', '..\\'], '', $rawUrl), '/\\');

        // Resolve absolute path
        $fullPath = BASE_PATH . '/' . $cleanRelPath;
        $realPath = realpath($fullPath);
        $allowedBase = realpath(BASE_PATH . '/assets');

        // Security check: must reside inside assets folder
        if (!$realPath || !$allowedBase || strpos($realPath, $allowedBase) !== 0 || !file_exists($realPath)) {
            Response::status(404);
            echo "Belge dosyası sunucuda bulunamadı.";
            exit;
        }

        // Clean filename for HTTP header
        $title = $doc['label_tr'] ?: basename($realPath);
        $safeTitle = preg_replace('/[^a-zA-Z0-9_\-\.ğüşıöçĞÜŞİÖÇ ]/u', '_', $title);
        if (!preg_match('/\.pdf$/i', $safeTitle)) {
            $safeTitle .= '.pdf';
        }

        $fsize = filesize($realPath);
        $mime = 'application/pdf';

        // Clear any previous output buffering
        while (ob_get_level()) {
            ob_end_clean();
        }

        Response::status(200);
        Response::header('Content-Type', $mime);
        $disposition = $download ? 'attachment' : 'inline';
        Response::header('Content-Disposition', $disposition . '; filename="' . $safeTitle . '"; filename*=UTF-8\'\'' . rawurlencode($safeTitle));
        Response::header('Content-Length', (string)$fsize);
        Response::header('Cache-Control', 'public, max-age=86400');
        Response::header('X-Content-Type-Options', 'nosniff');

        readfile($realPath);
        exit;
    }
}
