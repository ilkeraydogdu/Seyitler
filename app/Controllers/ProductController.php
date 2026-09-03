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
    public function index(Request $request, ?string $pageParam = null): void
    {
        $categoryId = $request->get('category') !== null ? (int)$request->get('category') : null;
        $search = $request->get('search') ? trim((string)$request->get('search')) : null;

        // Strict input validation against tampering and SQL injection
        $rawPage = $pageParam !== null ? $pageParam : $request->get('page');
        if ($rawPage !== null) {
            if (!preg_match('/^[1-9]\d{0,6}$/', (string)$rawPage)) {
                Response::status(404);
                View::render('pages/404', [
                    'pageTitle' => 'Sayfa Bulunamadı - Seyitler Kimya',
                ]);
                return;
            }
            $page = (int)$rawPage;
        } else {
            $page = 1;
        }

        // SEO Rule: Page 1 must not exist as /products/page/1 or /products?page=1 (prevent duplicate content)
        if ($page === 1 && ($pageParam !== null || $request->get('page') !== null)) {
            if ($categoryId === null && $search === null) {
                Response::redirect(url('/products'), 301);
                return;
            }
        }

        // 12 products per page for balanced, responsive 3-column grid
        $pagination = Product::paginateActive($page, 12, $categoryId, $search);

        // Prevent soft-404 / crawling out-of-range pages
        if ($page > $pagination['totalPages'] && $pagination['totalPages'] > 0) {
            Response::status(404);
            View::render('pages/404', [
                'pageTitle' => 'Sayfa Bulunamadı - Seyitler Kimya',
            ]);
            return;
        }

        $categories = Category::all();

        $pageTitle = __('Ürünlerimiz - Seyitler Kimya', 'Ürünlerimiz - Seyitler Kimya');
        if ($categoryId !== null) {
            $cat = Category::findById($categoryId);
            if ($cat) {
                $pageTitle = Category::getName($cat) . ' - ' . $pageTitle;
            }
        }

        // Search engine optimization: append page number to prevent duplicate titles
        if ($pagination['page'] > 1) {
            $pageTitle .= ' (' . __('Sayfa', 'Sayfa') . ' ' . $pagination['page'] . ')';
        }

        // Active query parameters to retain during pagination navigation
        $queryParams = [];
        if ($categoryId !== null) {
            $queryParams['category'] = $categoryId;
        }
        if ($search !== null) {
            $queryParams['search'] = $search;
        }

        // Canonical and SEO pagination relations
        $canonicalUrl = $page > 1 ? url('/products/page/' . $page) : url('/products');
        if (!empty($queryParams)) {
            $canonicalUrl = url('/products') . '?' . http_build_query(array_merge($queryParams, $page > 1 ? ['page' => $page] : []));
        }

        $prevUrl = null;
        if ($page > 1) {
            $prevUrl = ($page - 1 === 1) ? url('/products') : url('/products/page/' . ($page - 1));
            if (!empty($queryParams)) {
                $prevUrl = url('/products') . '?' . http_build_query(array_merge($queryParams, ($page - 1 > 1) ? ['page' => $page - 1] : []));
            }
        }

        $nextUrl = null;
        if ($page < $pagination['totalPages']) {
            $nextUrl = url('/products/page/' . ($page + 1));
            if (!empty($queryParams)) {
                $nextUrl = url('/products') . '?' . http_build_query(array_merge($queryParams, ['page' => $page + 1]));
            }
        }

        View::render('products/index', [
            'products'         => $pagination['items'],
            'pagination'       => $pagination,
            'categories'       => $categories,
            'activeCategoryId' => $categoryId,
            'search'           => $search,
            'queryParams'      => $queryParams,
            'canonicalUrl'     => $canonicalUrl,
            'prevUrl'          => $prevUrl,
            'nextUrl'          => $nextUrl,
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
            'seoMeta'         => [
                'product' => $product,
                'breadcrumbs' => [
                    ['name' => 'Anasayfa', 'url' => url('/')],
                    ['name' => 'Ürünlerimiz', 'url' => url('/products')],
                    ['name' => Product::getTitle($product), 'url' => url('/products/' . $product['slug'])],
                ],
            ],
        ]);
    }
}
