<?php

namespace App\Core;

class Request
{
    protected string $method;
    protected string $uri;
    protected string $path;
    protected string $basePath;
    protected array $query;
    protected array $post;
    protected array $files;
    protected array $server;

    public function __construct()
    {
        $this->server = $_SERVER;
        $this->method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $this->query  = $_GET;
        $this->post   = $_POST;
        $this->files  = $_FILES;

        // Base path tespiti (Örn: WampServer altında /seyitler.com veya canlıda /)
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $baseDir = dirname($scriptName);
        if (PHP_SAPI === 'cli' || str_contains($baseDir, ':')) {
            $this->basePath = '/seyitler.com';
        } else {
            $this->basePath = ($baseDir === '/' || $baseDir === '\\') ? '' : str_replace('\\', '/', $baseDir);
        }
        $this->basePath = rtrim($this->basePath, '/');

        // İstek yolu (URI) temizleme
        $rawUri = $_SERVER['REQUEST_URI'] ?? '/';
        $pathOnly = parse_url($rawUri, PHP_URL_PATH) ?? '/';

        // Base path'i kaldır
        if ($this->basePath !== '' && str_starts_with($pathOnly, $this->basePath)) {
            $pathOnly = substr($pathOnly, strlen($this->basePath));
        }

        $this->path = '/' . trim($pathOnly, '/');
        if ($this->path === '') {
            $this->path = '/';
        }
        $this->uri = $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function isPost(): bool
    {
        return $this->method === 'POST';
    }

    public function isGet(): bool
    {
        return $this->method === 'GET';
    }

    public function isAjax(): bool
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
            || (str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json'));
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function uri(): string
    {
        return $this->path;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function get(string $key, $default = null)
    {
        return $this->query[$key] ?? $default;
    }

    public function post(string $key = null, $default = null)
    {
        if ($key === null) {
            return $this->post;
        }
        return $this->post[$key] ?? $default;
    }

    public function input(string $key, $default = null)
    {
        return $this->post[$key] ?? $this->query[$key] ?? $default;
    }

    public function all(): array
    {
        return array_merge($this->query, $this->post);
    }

    public function file(string $key): ?array
    {
        if (isset($this->files[$key]) && $this->files[$key]['error'] !== UPLOAD_ERR_NO_FILE) {
            return $this->files[$key];
        }
        return null;
    }

    public function hasFile(string $key): bool
    {
        return isset($this->files[$key]) && $this->files[$key]['error'] === UPLOAD_ERR_OK;
    }
}
