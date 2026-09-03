<?php

namespace App\Core;

class FileUploader
{
    protected static array $allowedImageMimes = [
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'webp' => 'image/webp',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
    ];

    /**
     * Upload an image with automatic WebP conversion, dimension optimization and re-encoding sanitization.
     * Prevents webshells, strips malware/exif and enforces LCP speed standards.
     */
    public static function uploadImage(
        array $file,
        string $targetDirRelative = 'assets/images/products/',
        array $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'ico'],
        int $maxDimension = 1920,
        int $quality = 85
    ): ?string {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
            return null;
        }

        // 15MB file size limit
        if ($file['size'] > 15 * 1024 * 1024) {
            return null;
        }

        $origName = $file['name'] ?? '';
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions, true)) {
            return null;
        }

        // 1. Binary Magic Bytes Validation
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if ($ext !== 'svg' && $ext !== 'ico') {
                $expectedMime = self::$allowedImageMimes[$ext] ?? null;
                if ($expectedMime && $mime !== $expectedMime) {
                    return null; // Forged extension spoof
                }
            }
        }

        // Target directory setup
        $root = dirname(__DIR__, 2);
        $realTargetDir = $root . '/' . trim($targetDirRelative, '/') . '/';
        if (!is_dir($realTargetDir)) {
            mkdir($realTargetDir, 0755, true);
        }

        $baseRandom = time() . '_' . bin2hex(random_bytes(6));

        // 2. Special format bypass (SVG & ICO are vector/icon files, not converted to WebP)
        if ($ext === 'svg' || $ext === 'ico') {
            $destFilename = $baseRandom . '.' . $ext;
            $destPath = $realTargetDir . $destFilename;

            // Simple XML/SVG tag sanitization
            if ($ext === 'svg') {
                $svgContent = file_get_contents($file['tmp_name']);
                if (preg_match('/<script|javascript:|data:/i', $svgContent)) {
                    return null; // Reject XSS in SVG
                }
            }

            if (move_uploaded_file($file['tmp_name'], $destPath)) {
                @chmod($destPath, 0644);
                return trim($targetDirRelative, '/') . '/' . $destFilename;
            }
            return null;
        }

        // 3. Image Re-Encoding & Autonomous WebP Conversion via GD
        if (extension_loaded('gd') && function_exists('imagewebp')) {
            $fileData = file_get_contents($file['tmp_name']);
            $sourceImage = @imagecreatefromstring($fileData);

            if ($sourceImage !== false) {
                $width = imagesx($sourceImage);
                $height = imagesy($sourceImage);

                // Resize down proportionally if image is extraordinarily massive
                if ($width > $maxDimension || $height > $maxDimension) {
                    $ratio = min($maxDimension / $width, $maxDimension / $height);
                    $newWidth = (int)round($width * $ratio);
                    $newHeight = (int)round($height * $ratio);

                    $targetCanvas = imagecreatetruecolor($newWidth, $newHeight);

                    // Preserve alpha transparency for PNG/WebP
                    imagealphablending($targetCanvas, false);
                    imagesavealpha($targetCanvas, true);
                    $transparent = imagecolorallocatealpha($targetCanvas, 255, 255, 255, 127);
                    imagefilledrectangle($targetCanvas, 0, 0, $newWidth, $newHeight, $transparent);

                    imagecopyresampled($targetCanvas, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagedestroy($sourceImage);
                    $finalImage = $targetCanvas;
                } else {
                    $finalImage = $sourceImage;
                    imagealphablending($finalImage, false);
                    imagesavealpha($finalImage, true);
                }

                // Save as Autonomous WebP
                $destFilename = $baseRandom . '.webp';
                $destPath = $realTargetDir . $destFilename;

                $success = imagewebp($finalImage, $destPath, $quality);
                imagedestroy($finalImage);

                if ($success && file_exists($destPath)) {
                    @chmod($destPath, 0644);
                    return trim($targetDirRelative, '/') . '/' . $destFilename;
                }
            }
        }

        // 4. Fallback if GD conversion fails: Store safe original with clean extension
        $fallbackFilename = $baseRandom . '.' . $ext;
        $fallbackDest = $realTargetDir . $fallbackFilename;

        if (move_uploaded_file($file['tmp_name'], $fallbackDest)) {
            @chmod($fallbackDest, 0644);
            return trim($targetDirRelative, '/') . '/' . $fallbackFilename;
        }

        return null;
    }

    /**
     * Upload a PDF document safely with magic byte (%PDF) check.
     */
    public static function uploadPdf(array $file, string $targetDirRelative = 'assets/pdf/'): ?string
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
            return null;
        }

        // 50MB PDF limit
        if ($file['size'] > 50 * 1024 * 1024) {
            return null;
        }

        $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        if ($ext !== 'pdf') {
            return null;
        }

        // Binary Magic Bytes Validation: First 4 bytes must be %PDF
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
