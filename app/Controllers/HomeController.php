<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Models\Category;
use App\Models\Product;

class HomeController
{
    public function index(Request $request): void
    {
        $products = Product::allActive();
        $categories = Category::all();

        View::render('home/index', [
            'products'        => $products,
            'categories'      => $categories,
            'pageTitle'       => __('Seyitler Kimya - Sağlık Üretiyoruz', 'Seyitler Kimya - Sağlık Üretiyoruz'),
            'pageDescription' => __('Seyitler Kimya - Medikal plaster, yara örtüleri ve ilk yardım ürünlerinde Türkiye’nin öncü üreticisi.', 'Seyitler Kimya - Medikal plaster, yara örtüleri ve ilk yardım ürünlerinde Türkiye’nin öncü üreticisi.'),
        ]);
    }
}
