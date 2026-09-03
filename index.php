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

$request = new Request();

// ==========================================
// PUBLIC FRONTEND ROUTES
// ==========================================

// Homepage
Router::get('/', 'App\Controllers\HomeController@index');

// Corporate Pages
Router::get('/about-us', 'App\Controllers\CorporateController@index');
Router::get('/about-us/tarihce', 'App\Controllers\CorporateController@history');
Router::get('/about-us/misyon-vizyon', 'App\Controllers\CorporateController@missionVision');
Router::get('/about-us/degerler', 'App\Controllers\CorporateController@values');
Router::get('/about-us/organizasyon', 'App\Controllers\CorporateController@organization');
Router::get('/about-us/surdurulebilirlik', 'App\Controllers\CorporateController@sustainability');
Router::get('/about-us/insan-kaynaklari', 'App\Controllers\CorporateController@humanResources');

// Product Catalog & Dynamic Detail
Router::get('/products', 'App\Controllers\ProductController@index');
Router::get('/products/{slug}', 'App\Controllers\ProductController@show');

// Investor Relations Portal
Router::get('/investors', 'App\Controllers\InvestorController@index');

// R&D and Areas of Activity
Router::get('/rd', 'App\Controllers\PageController@rd');
Router::get('/areas', 'App\Controllers\PageController@areas');

// Contact Form
Router::get('/contact', 'App\Controllers\ContactController@index');
Router::post('/contact', 'App\Controllers\ContactController@send');

// Legal & Policies
Router::get('/kvkk', 'App\Controllers\PageController@kvkk');
Router::get('/cerez-politikasi', 'App\Controllers\PageController@cookiePolicy');

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
// CMS ADMIN PANEL ROUTES
// ==========================================

// Authentication
Router::get('/admin/login', 'App\Controllers\Admin\AuthController@login');
Router::post('/admin/login', 'App\Controllers\Admin\AuthController@authenticate');
Router::get('/admin/logout', 'App\Controllers\Admin\AuthController@logout');

// Dashboard
Router::get('/admin', 'App\Controllers\Admin\DashboardController@index');

// Products CRUD
Router::get('/admin/products', 'App\Controllers\Admin\ProductController@index');
Router::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');
Router::post('/admin/products/store', 'App\Controllers\Admin\ProductController@store');
Router::get('/admin/products/edit/{id}', 'App\Controllers\Admin\ProductController@edit');
Router::post('/admin/products/update/{id}', 'App\Controllers\Admin\ProductController@update');
Router::post('/admin/products/delete/{id}', 'App\Controllers\Admin\ProductController@delete');

// Product Variant Specs & Gallery Sub-routes
Router::post('/admin/products/variant/add/{id}', 'App\Controllers\Admin\ProductController@addVariant');
Router::post('/admin/products/variant/delete/{id}', 'App\Controllers\Admin\ProductController@deleteVariant');
Router::post('/admin/products/gallery/add/{id}', 'App\Controllers\Admin\ProductController@addGalleryImage');
Router::post('/admin/products/gallery/delete/{id}', 'App\Controllers\Admin\ProductController@deleteGalleryImage');

// Categories
Router::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');
Router::post('/admin/categories/store', 'App\Controllers\Admin\CategoryController@store');
Router::post('/admin/categories/delete/{id}', 'App\Controllers\Admin\CategoryController@delete');

// Investor Documents
Router::get('/admin/investors', 'App\Controllers\Admin\InvestorController@index');
Router::post('/admin/investors/store', 'App\Controllers\Admin\InvestorController@store');
Router::post('/admin/investors/delete/{id}', 'App\Controllers\Admin\InvestorController@delete');

// News & Announcements
Router::get('/admin/news', 'App\Controllers\Admin\NewsController@index');
Router::post('/admin/news/store', 'App\Controllers\Admin\NewsController@store');
Router::post('/admin/news/delete/{id}', 'App\Controllers\Admin\NewsController@delete');

// Contact Inquiries Messages
Router::get('/admin/messages', 'App\Controllers\Admin\MessageController@index');
Router::get('/admin/messages/{id}', 'App\Controllers\Admin\MessageController@show');
Router::post('/admin/messages/delete/{id}', 'App\Controllers\Admin\MessageController@delete');

// Settings
Router::get('/admin/settings', 'App\Controllers\Admin\SettingController@index');
Router::post('/admin/settings/update', 'App\Controllers\Admin\SettingController@update');

// Translations
Router::get('/admin/translations', 'App\Controllers\Admin\TranslationController@index');
Router::post('/admin/translations/update', 'App\Controllers\Admin\TranslationController@update');

// ==========================================
// DISPATCH REQUEST
// ==========================================
Router::dispatch($request);
