<?php

namespace App\Core;

class FileUploader
{
    /**
     * Mime type map for magic bytes validation
     */
    protected static array $allowedImageMimes = [
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'webp' => 'image/webp',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
    ];

    protected static array $allowedDocMimes = [
        'pdf' => 'application/pdf',
    ];

    /**
     * Securely upload an image file
     */
    public static function uploadImage(array $file, string $targetDirRelative = 'assets/images/products/', array $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp']): ?string
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
            return null;
        }

        // Max file size: 15MB
        if ($file['size'] > 15 * 1024 * 1024) {
            return null;
        }

        $origName = $file['name'] ?? '';
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions, true)) {
            return null;
        }

        // Binary Magic Bytes Validation via finfo
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            // Special case for SVG/ICO or verify against mapped mime
            if ($ext !== 'svg' && $ext !== 'ico') {
                $expectedMime = self::$allowedImageMimes[$ext] ?? null;
                if ($expectedMime && $mime !== $expectedMime) {
                    return null; // Forged extension!
                }
            }
        }

        // Target directory setup
        $root = dirname(__DIR__, 2);
        $realTargetDir = $root . '/' . trim($targetDirRelative, '/') . '/';
        if (!is_dir($realTargetDir)) {
            mkdir($realTargetDir, 0755, true);
        }

        // Cryptographically secure randomized filename to prevent Path Traversal & Collisions
        $safeFilename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
        $dest = $realTargetDir . $safeFilename;

        if (move_uploaded_file($file['tmp_name'], $dest)) {
            // Set safe file permissions
            @chmod($dest, 0644);
            return trim($targetDirRelative, '/') . '/' . $safeFilename;
        }

        return null;
    }

    /**
     * Securely upload a PDF document
     */
    public static function uploadPdf(array $file, string $targetDirRelative = 'assets/pdf/'): ?string
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
            return null;
        }

        // Max file size: 50MB
        if ($file['size'] > 50 * 1024 * 1024) {
            return null;
        }

        $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        if ($ext !== 'pdf') {
            return null;
        }

        // Binary Magic Bytes Validation: Must start with %PDF
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if ($mime !== 'application/pdf') {
                return null;
            }
        }

        // Direct check of first 4 bytes
        $handle = fopen($file['tmp_name'], 'rb');
        $bytes = fread($handle, 4);
        fclose($handle);

        if ($bytes !== '%PDF') {
            return null;
        }

        $root = dirname(__DIR__, 2);
        $realTargetDir = $root . '/' . trim($targetDirRelative, '/') . '/';
        if (!is_dir($realTargetDir)) {
            mkdir($realTargetDir, 0755, true);
        }

        // Sanitize original name prefix + secure random hash
        $cleanBase = preg_replace('/[^a-zA-Z0-9_\-]/', '_', pathinfo($file['name'], PATHINFO_FILENAME));
        $safeFilename = $cleanBase . '_' . bin2hex(random_bytes(6)) . '.pdf';
        $dest = $realTargetDir . $safeFilename;

        if (move_uploaded_file($file['tmp_name'], $dest)) {
            @chmod($dest, 0644);
            return trim($targetDirRelative, '/') . '/' . $safeFilename;
        }

        return null;
    }
}
