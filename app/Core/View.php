<?php

namespace App\Core;

class View
{
    protected static string $viewsPath = '';

    public static function init(?string $baseDir = null): void
    {
        if ($baseDir === null) {
            $baseDir = dirname(__DIR__, 2);
        }
        self::$viewsPath = rtrim($baseDir, '/\\') . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
    }

    public static function getViewsPath(): string
    {
        if (empty(self::$viewsPath)) {
            self::$viewsPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
        }
        return self::$viewsPath;
    }

    public static function render(string $viewPath, array $data = [], ?string $layout = 'main'): void
    {
        $base = self::getViewsPath();
        $viewFile = $base . str_replace('/', DIRECTORY_SEPARATOR, $viewPath) . '.php';

        if (!file_exists($viewFile)) {
            throw new \RuntimeException("Görünüm dosyası bulunamadı: {$viewFile}");
        }

        // Değişkenleri yerel kapsama aktar
        extract($data, EXTR_SKIP);

        // Görünüm içeriğini tampona al
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // Eğer layout istenmiyorsa doğrudan bas
        if ($layout === null) {
            echo $content;
            return;
        }

        $layoutClean = trim(str_replace(['layouts/', 'layouts\\'], '', $layout), '/\\');
        $layoutFile = $base . 'layouts' . DIRECTORY_SEPARATOR . $layoutClean . '.php';

        if (!file_exists($layoutFile)) {
            throw new \RuntimeException("Şablon (layout) dosyası bulunamadı: {$layoutFile}");
        }

        require $layoutFile;
    }

    public static function partial(string $partialPath, array $data = []): void
    {
        $partialFile = self::getViewsPath() . str_replace('/', DIRECTORY_SEPARATOR, $partialPath) . '.php';

        if (!file_exists($partialFile)) {
            throw new \RuntimeException("Parçalı görünüm (partial) bulunamadı: {$partialFile}");
        }

        extract($data, EXTR_SKIP);
        require $partialFile;
    }
}
