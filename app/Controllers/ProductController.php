<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTable;

class ProductController
{
    public function index(Request $request): void
    {
        $categoryId = $request->get('category') !== null ? (int)$request->get('category') : null;
        $search = $request->get('search');

        $products = Product::allActive($categoryId, $search);
        $categories = Category::all();

        $pageTitle = __('Ürünlerimiz - Seyitler Kimya', 'Ürünlerimiz - Seyitler Kimya');
        if ($categoryId !== null) {
            $cat = Category::findById($categoryId);
            if ($cat) {
                $pageTitle = Category::getName($cat) . ' - ' . $pageTitle;
            }
        }

        View::render('products/index', [
            'products'         => $products,
            'categories'       => $categories,
            'activeCategoryId' => $categoryId,
            'search'           => $search,
            'pageTitle'        => $pageTitle,
            'pageDescription'  => __('Tıbbi plasterler, yara bakım örtüleri, enjeksiyon bantları ve medikal ürünler portföyümüz.', 'Tıbbi plasterler, yara bakım örtüleri, enjeksiyon bantları ve medikal ürünler portföyümüz.'),
        ]);
    }

    public function show(Request $request, string $slug): void
    {
        $product = Product::findBySlug($slug);

        if (!$product || empty($product['is_active'])) {
            Response::status(404);
            View::render('pages/404', [
                'pageTitle' => 'Ürün Bulunamadı - Seyitler Kimya',
            ]);
            return;
        }

        $gallery = Product::getGallery($product);
        if (empty($gallery) && !empty($product['main_image'])) {
            $gallery = [$product['main_image']];
        }

        $features = Product::getFeatures($product);
        $specs = ProductTable::getByProductId((int)$product['id']);
        $related = Product::getRelated((int)$product['category_id'], (int)$product['id'], 4);
        $categories = Category::all();

        View::render('products/show', [
            'product'         => $product,
            'gallery'         => $gallery,
            'features'        => $features,
            'specs'           => $specs,
            'related'         => $related,
            'categories'      => $categories,
            'pageTitle'       => Product::getTitle($product) . ' - Seyitler Kimya',
            'pageDescription' => Product::getDescription($product),
        ]);
    }
}
