<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;

class SeoController
{
    /**
     * Generate Google-compliant dynamic XML sitemap with multi-lingual hreflang.
     */
    public function sitemap(Request $request): void
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $baseUrl = "{$protocol}://{$host}" . rtrim(url('/'), '/');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        $today = date('Y-m-d');

        // 1. Static Core Application Routes
        $staticRoutes = [
            ['path' => '', 'priority' => '1.0', 'freq' => 'daily'],
            ['path' => '/about-us', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/about-us/history', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/about-us/mission-vision', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/about-us/values', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/about-us/organization', 'priority' => '0.7', 'freq' => 'monthly'],
            ['path' => '/about-us/sustainability', 'priority' => '0.7', 'freq' => 'monthly'],
            ['path' => '/about-us/human-resources', 'priority' => '0.7', 'freq' => 'monthly'],
            ['path' => '/products', 'priority' => '0.9', 'freq' => 'weekly'],
            ['path' => '/investors', 'priority' => '0.8', 'freq' => 'weekly'],
            ['path' => '/rd', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/areas', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/contact', 'priority' => '0.8', 'freq' => 'monthly'],
            ['path' => '/kvkk', 'priority' => '0.4', 'freq' => 'yearly'],
            ['path' => '/cookie-policy', 'priority' => '0.4', 'freq' => 'yearly'],
        ];

        foreach ($staticRoutes as $r) {
            $loc = $baseUrl . $r['path'];
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>{$r['freq']}</changefreq>\n";
            $xml .= "    <priority>{$r['priority']}</priority>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"tr\" href=\"" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($loc . '?lang=en', ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"ar\" href=\"" . htmlspecialchars($loc . '?lang=ar', ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "  </url>\n";
        }

        // 2. All Active Products
        $products = Product::allActive();
        foreach ($products as $p) {
            $loc = $baseUrl . '/products/' . $p['slug'];
            $lastmod = !empty($p['updated_at']) ? date('Y-m-d', strtotime($p['updated_at'])) : (!empty($p['created_at']) ? date('Y-m-d', strtotime($p['created_at'])) : $today);
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"tr\" href=\"" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($loc . '?lang=en', ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"ar\" href=\"" . htmlspecialchars($loc . '?lang=ar', ENT_XML1, 'UTF-8') . "\"/>\n";
            $xml .= "  </url>\n";
        }

        // 3. All Categories
        $categories = Category::all();
        foreach ($categories as $c) {
            $loc = $baseUrl . '/products?category=' . $c['id'];
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.8</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        Response::status(200);
        Response::header('Content-Type', 'application/xml; charset=utf-8');
        Response::header('Cache-Control', 'public, max-age=86400');
        echo $xml;
        exit;
    }

    /**
     * Generate dynamic robots.txt.
     * Strictly disallows admin and executive routes while welcoming search engine bots to public content.
     */
    public function robots(Request $request): void
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $sitemapUrl = "{$protocol}://{$host}" . rtrim(url('/sitemap.xml'), '/');

        $txt = "User-agent: *\n";
        // Disallow executive backend completely
        $txt .= "Disallow: /podmin/\n";
        $txt .= "Disallow: /podmin\n";
        $txt .= "Disallow: /admin/\n";
        $txt .= "Disallow: /admin\n";
        $txt .= "Disallow: /seyitler.com/podmin/\n";
        $txt .= "Disallow: /seyitler.com/podmin\n";
        $txt .= "Disallow: /seyitler.com/admin/\n";
        $txt .= "Disallow: /seyitler.com/admin\n";
        $txt .= "Disallow: /documents/download/\n";
        // Allow public assets and pages
        $txt .= "Allow: /assets/\n";
        $txt .= "Allow: /\n\n";
        // Sitemap specification
        $txt .= "Sitemap: {$sitemapUrl}\n";

        Response::status(200);
        Response::header('Content-Type', 'text/plain; charset=utf-8');
        Response::header('Cache-Control', 'public, max-age=86400');
        echo $txt;
        exit;
    }
}
