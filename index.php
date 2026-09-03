<?php

/**
 * Seyitler Kimya Sanayi A.Ş. - Enterprise Web Application Entrypoint
 * Fast, Clean, Centralized Fullstack PHP Architecture
 */

declare(strict_types=1);

// Error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', '0'); // Safe for production, errors logged

// Define base root
define('BASE_PATH', __DIR__);

// Load Autoloader & Helpers
require_once BASE_PATH . '/app/Core/Autoloader.php';
\App\Core\Autoloader::register(BASE_PATH);
require_once BASE_PATH . '/app/Core/Helper.php';

// Start Session & Load Language
use App\Core\Session;
use App\Core\I18n;
use App\Core\Request;
use App\Core\Response;
use App\Core\Router;

Session::start();
I18n::init();

// Apply Enterprise HTTP Security Headers & Output Compression
\App\Core\Security::applyHeaders();
if (!ob_get_level()) {
    if (!ob_start("ob_gzhandler")) {
        ob_start();
    }
}

$request = new Request();

// Centralized Protection for Admin Routes: Search Engine Isolation & Session Timeout
if (str_starts_with($request->uri(), '/podmin')) {
    \App\Core\Security::applyAdminHeaders();
    if (!str_starts_with($request->uri(), '/podmin/login') && \App\Core\Auth::check()) {
        if (!\App\Core\Security::checkSessionInactivity(120)) {
            Session::flash('error', 'Oturumunuz işlem yapılmadığı için güvenlik gerekçesiyle sonlandırıldı.');
            Response::redirect(url('/podmin/login'));
            exit;
        }
    }
}

// ==========================================
// PUBLIC FRONTEND ROUTES
// ==========================================

// Search Engine Optimization (Google SEO)
Router::get('/sitemap.xml', 'App\Controllers\SeoController@sitemap');
Router::get('/robots.txt', 'App\Controllers\SeoController@robots');

// Homepage
Router::get('/', 'App\Controllers\HomeController@index');

// Corporate Pages (both Turkish and English aliases)
Router::get('/about-us', 'App\Controllers\CorporateController@index');
Router::get('/about-us/tarihce', 'App\Controllers\CorporateController@history');
Router::get('/about-us/history', 'App\Controllers\CorporateController@history');
Router::get('/about-us/misyon-vizyon', 'App\Controllers\CorporateController@missionVision');
Router::get('/about-us/mission-vision', 'App\Controllers\CorporateController@missionVision');
Router::get('/about-us/degerler', 'App\Controllers\CorporateController@values');
Router::get('/about-us/values', 'App\Controllers\CorporateController@values');
Router::get('/about-us/organizasyon', 'App\Controllers\CorporateController@organization');
Router::get('/about-us/organization', 'App\Controllers\CorporateController@organization');
Router::get('/about-us/surdurulebilirlik', 'App\Controllers\CorporateController@sustainability');
Router::get('/about-us/sustainability', 'App\Controllers\CorporateController@sustainability');
Router::get('/about-us/insan-kaynaklari', 'App\Controllers\CorporateController@humanResources');
Router::get('/about-us/human-resources', 'App\Controllers\CorporateController@humanResources');

// Product Catalog & Dynamic Detail
Router::get('/products', 'App\Controllers\ProductController@index');
Router::get('/products/page/{page}', 'App\Controllers\ProductController@index');
Router::get('/products/{slug}', 'App\Controllers\ProductController@show');

// Investor Relations Portal & Centralized Secure Document Delivery
Router::get('/investors', 'App\Controllers\InvestorController@index');
Router::get('/documents/{id}', 'App\Controllers\DocumentController@show');
Router::get('/documents/download/{id}', 'App\Controllers\DocumentController@download');

// R&D and Areas of Activity
Router::get('/rd', 'App\Controllers\PageController@rd');
Router::get('/areas', 'App\Controllers\PageController@areas');

// Contact Form
Router::get('/contact', 'App\Controllers\ContactController@index');
Router::post('/contact', 'App\Controllers\ContactController@send');

// Legal & Policies
Router::get('/kvkk', 'App\Controllers\PageController@kvkk');
Router::get('/cerez-politikasi', 'App\Controllers\PageController@cookiePolicy');
Router::get('/cookie-policy', 'App\Controllers\PageController@cookiePolicy');

// SEO, Dynamic XML Sitemap & Robots Routes
Router::get('/sitemap.xml', 'App\Controllers\SeoController@sitemap');
Router::get('/robots.txt', 'App\Controllers\SeoController@robots');
Router::get('/.well-known/security.txt', 'App\Controllers\SeoController@securityTxt');
Router::get('/security.txt', 'App\Controllers\SeoController@securityTxt');

// Language Switcher Route
Router::get('/lang/{locale}', function (Request $req, string $locale) {
    I18n::setLocale($locale);
    $referer = $_SERVER['HTTP_REFERER'] ?? url('/');
    Response::redirect($referer);
});

// Legacy HTML redirects to SEO clean URLs
Router::get('/index.html', function () { Response::redirect(url('/'), 301); });
Router::get('/about-us.html', function () { Response::redirect(url('/about-us'), 301); });
Router::get('/products.html', function () { Response::redirect(url('/products'), 301); });
Router::get('/investors.html', function () { Response::redirect(url('/investors'), 301); });
Router::get('/rd.html', function () { Response::redirect(url('/rd'), 301); });
Router::get('/areas.html', function () { Response::redirect(url('/areas'), 301); });
Router::get('/contact.html', function () { Response::redirect(url('/contact'), 301); });
Router::get('/kvkk.html', function () { Response::redirect(url('/kvkk'), 301); });
Router::get('/cerez-politikasi.html', function () { Response::redirect(url('/cerez-politikasi'), 301); });

// ==========================================
// SECURITY TRAP: Obsolete /admin is permanently blocked
// ==========================================
Router::get('/admin', function () {
    Response::status(404);
    echo "<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p></body></html>";
    exit;
});
Router::get('/admin/{any}', function () {
    Response::status(404);
    echo "<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p></body></html>";
    exit;
});

// ==========================================
// CMS EXECUTIVE PANEL ROUTES (/podmin)
// ==========================================

// Authentication
Router::get('/podmin/login', 'App\Controllers\Admin\AuthController@login');
Router::post('/podmin/login', 'App\Controllers\Admin\AuthController@authenticate');
Router::get('/podmin/logout', 'App\Controllers\Admin\AuthController@logout');

// Dashboard
Router::get('/podmin', 'App\Controllers\Admin\DashboardController@index');

// Products CRUD
Router::get('/podmin/products', 'App\Controllers\Admin\ProductController@index');
Router::get('/podmin/products/create', 'App\Controllers\Admin\ProductController@create');
Router::post('/podmin/products/store', 'App\Controllers\Admin\ProductController@store');
Router::get('/podmin/products/edit/{id}', 'App\Controllers\Admin\ProductController@edit');
Router::post('/podmin/products/update/{id}', 'App\Controllers\Admin\ProductController@update');
Router::post('/podmin/products/delete/{id}', 'App\Controllers\Admin\ProductController@delete');

// Product Variant Specs & Gallery Sub-routes
Router::post('/podmin/products/variant/add/{id}', 'App\Controllers\Admin\ProductController@addVariant');
Router::post('/podmin/products/variant/delete/{id}', 'App\Controllers\Admin\ProductController@deleteVariant');
Router::post('/podmin/products/gallery/add/{id}', 'App\Controllers\Admin\ProductController@addGalleryImage');
Router::post('/podmin/products/gallery/delete/{id}', 'App\Controllers\Admin\ProductController@deleteGalleryImage');

// Categories
Router::get('/podmin/categories', 'App\Controllers\Admin\CategoryController@index');
Router::post('/podmin/categories/store', 'App\Controllers\Admin\CategoryController@store');
Router::post('/podmin/categories/delete/{id}', 'App\Controllers\Admin\CategoryController@delete');

// Page Management CRUD
Router::get('/podmin/pages', 'App\Controllers\Admin\PageController@index');
Router::get('/podmin/pages/{id}/edit', 'App\Controllers\Admin\PageController@edit');
Router::post('/podmin/pages/{id}/update', 'App\Controllers\Admin\PageController@update');

// Investor Documents
Router::get('/podmin/investors', 'App\Controllers\Admin\InvestorController@index');
Router::post('/podmin/investors/store', 'App\Controllers\Admin\InvestorController@store');
Router::post('/podmin/investors/delete/{id}', 'App\Controllers\Admin\InvestorController@delete');

// News & Announcements
Router::get('/podmin/news', 'App\Controllers\Admin\NewsController@index');
Router::post('/podmin/news/store', 'App\Controllers\Admin\NewsController@store');
Router::post('/podmin/news/delete/{id}', 'App\Controllers\Admin\NewsController@delete');

// Contact Inquiries Messages
Router::get('/podmin/messages', 'App\Controllers\Admin\MessageController@index');
Router::get('/podmin/messages/{id}', 'App\Controllers\Admin\MessageController@show');
Router::post('/podmin/messages/delete/{id}', 'App\Controllers\Admin\MessageController@delete');

// Settings & Security
Router::get('/podmin/settings', 'App\Controllers\Admin\SettingController@index');
Router::post('/podmin/settings/update', 'App\Controllers\Admin\SettingController@update');
Router::post('/podmin/settings/change-password', 'App\Controllers\Admin\SettingController@changePassword');

// Translations
Router::get('/podmin/translations', 'App\Controllers\Admin\TranslationController@index');
Router::post('/podmin/translations/update', 'App\Controllers\Admin\TranslationController@update');

// ==========================================
// DISPATCH REQUEST
// ==========================================
Router::dispatch($request);
