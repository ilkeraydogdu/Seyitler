<?php

namespace App\Core;

use App\Models\SiteSetting;

class Seo
{
    /**
     * Get absolute canonical URL for current request.
     * Automatically preserves pagination (?page=) and category filter for search engines.
     */
    public static function canonicalUrl(array $allowedParams = ['page', 'category']): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $uriPath = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');

        $queryArray = [];
        if (!empty($_GET)) {
            foreach ($allowedParams as $param) {
                if (isset($_GET[$param]) && $_GET[$param] !== '') {
                    $val = (int)$_GET[$param];
                    // Don't append ?page=1 as it is identical to base url
                    if ($param === 'page' && $val <= 1) {
                        continue;
                    }
                    $queryArray[$param] = $val;
                }
            }
        }

        $queryString = !empty($queryArray) ? '?' . http_build_query($queryArray) : '';
        return "{$protocol}://{$host}{$uriPath}{$queryString}";
    }

    /**
     * Render rel="prev" and rel="next" pagination links for Google & search engine crawlers.
     * Generates clean semantic SEO paths (/products/page/{page}) when no query parameters exist.
     */
    public static function renderPaginationMeta(int $currentPage, int $totalPages, string $baseUrl, array $queryParams = []): string
    {
        if ($totalPages <= 1) {
            return '';
        }

        $html = '';

        // Previous page link
        if ($currentPage > 1) {
            if (empty($queryParams)) {
                $prevUrl = ($currentPage - 1 === 1) ? $baseUrl : rtrim($baseUrl, '/') . '/page/' . ($currentPage - 1);
            } else {
                $prevParams = $queryParams;
                if ($currentPage - 1 > 1) {
                    $prevParams['page'] = $currentPage - 1;
                } else {
                    unset($prevParams['page']);
                }
                $prevQuery = !empty($prevParams) ? '?' . http_build_query($prevParams) : '';
                $prevUrl = $baseUrl . $prevQuery;
            }
            $html .= "<link rel=\"prev\" href=\"" . htmlspecialchars($prevUrl, ENT_QUOTES, 'UTF-8') . "\" />\n    ";
        }

        // Next page link
        if ($currentPage < $totalPages) {
            if (empty($queryParams)) {
                $nextUrl = rtrim($baseUrl, '/') . '/page/' . ($currentPage + 1);
            } else {
                $nextParams = $queryParams;
                $nextParams['page'] = $currentPage + 1;
                $nextQuery = '?' . http_build_query($nextParams);
                $nextUrl = $baseUrl . $nextQuery;
            }
            $html .= "<link rel=\"next\" href=\"" . htmlspecialchars($nextUrl, ENT_QUOTES, 'UTF-8') . "\" />\n    ";
        }

        return $html;
    }

    /**
     * Render hreflang tags for multi-lingual SEO (TR / EN / AR).
     */
    public static function renderHreflangTags(): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $uriPath = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        $baseCanonical = "{$protocol}://{$host}{$uriPath}";

        $html = '';
        $locales = ['tr', 'en', 'ar'];

        foreach ($locales as $loc) {
            $langUrl = $baseCanonical . ($loc !== 'tr' ? "?lang={$loc}" : "");
            $html .= "<link rel=\"alternate\" hreflang=\"{$loc}\" href=\"" . htmlspecialchars($langUrl, ENT_QUOTES, 'UTF-8') . "\" />\n    ";
        }
        $html .= "<link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($baseCanonical, ENT_QUOTES, 'UTF-8') . "\" />\n";
        return $html;
    }

    /**
     * Generate Schema.org JSON-LD structured data.
     */
    public static function renderSchemaJsonLd(array $meta = []): string
    {
        $siteUrl = url('/');
        $logoUrl = asset(SiteSetting::get('site_logo', 'assets/images/logo.png'));

        $phone = SiteSetting::get('company_phone') ?: '+90 236 314 83 83';
        $email = SiteSetting::get('company_email') ?: 'seyitler@seyitler.com';
        $address = SiteSetting::get('company_address') ?: 'SELVİLİTEPE OSB MAH. OSB 2007. CAD. NO: 7 TURGUTLU / MANİSA';

        // 1. Organization & Medical Enterprise Schema
        $schemas = [
            [
                '@context' => 'https://schema.org',
                '@type' => 'MedicalBusiness',
                'name' => 'Seyitler Kimya Sanayi A.Ş.',
                'alternateName' => 'Seyitler Kimya',
                'url' => $siteUrl,
                'logo' => $logoUrl,
                'image' => $logoUrl,
                'description' => 'Sağlık sektöründe 1991 yılından bu yana tıbbi flaster, cerrahi bant ve medikal yara bakım ürünleri üreticisi.',
                'telephone' => $phone,
                'email' => $email,
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $address,
                    'addressLocality' => 'Turgutlu',
                    'addressRegion' => 'Manisa',
                    'addressCountry' => 'TR',
                ],
                'sameAs' => [
                    'https://www.linkedin.com/company/seyitler-kimya',
                    'https://x.com/SeyitlerA',
                    'https://www.instagram.com/seyitlerkimya/',
                ],
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Seyitler Kimya',
                'url' => $siteUrl,
                'potentialAction' => [
                    '@type' => 'SearchAction',
                    'target' => url('/products') . '?search={search_term_string}',
                    'query-input' => 'required name=search_term_string',
                ],
            ],
        ];

        // 2. Breadcrumbs Schema
        if (!empty($meta['breadcrumbs']) && is_array($meta['breadcrumbs'])) {
            $itemList = [];
            foreach ($meta['breadcrumbs'] as $idx => $bc) {
                $itemList[] = [
                    '@type' => 'ListItem',
                    'position' => $idx + 1,
                    'name' => $bc['name'],
                    'item' => $bc['url'],
                ];
            }
            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => $itemList,
            ];
        }

        // 3. Product Schema (when on product details)
        if (!empty($meta['product']) && is_array($meta['product'])) {
            $p = $meta['product'];
            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => \App\Models\Product::getTitle($p),
                'image' => asset(\App\Models\Product::getImage($p)),
                'description' => \App\Models\Product::getDescription($p),
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'Seyitler Kimya',
                ],
                'manufacturer' => [
                    '@type' => 'Organization',
                    'name' => 'Seyitler Kimya Sanayi A.Ş.',
                ],
                'offers' => [
                    '@type' => 'Offer',
                    'availability' => 'https://schema.org/InStock',
                    'priceCurrency' => 'TRY',
                    'price' => '0.00',
                    'url' => url('/products/' . $p['slug']),
                ],
            ];
        }

        $out = '';
        foreach ($schemas as $s) {
            $out .= '<script type="application/ld+json">' . json_encode($s, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n    ";
        }
        return $out;
    }
}
