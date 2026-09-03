<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;

class HomeController
{
    public function index(Request $request): void
    {
        $products   = Product::allActive();
        $categories = Category::all();
        $page       = \App\Models\Page::findBySlug('home');

        View::render('home/index', [
            'page'            => $page,
            'products'        => $products,
            'categories'      => $categories,
            'news'            => $news,
            'pageTitle'       => $page ? \App\Models\Page::getMetaTitle($page) : __('Seyitler Kimya - Sağlık Üretiyoruz', 'Seyitler Kimya - We Produce Health'),
            'pageDescription' => $page ? \App\Models\Page::getMetaDescription($page) : __('Seyitler Kimya - Medikal plaster, yara örtüleri ve ilk yardım ürünlerinde Türkiye’nin öncü üreticisi.', 'Seyitler Kimya - Leading manufacturer of medical plasters and wound care.'),
        ]);
    }
}
