<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTable;

class ProductController
{
    public function __construct()
    {
        Auth::requireAuth();
    }

    public function index(Request $request): void
    {
        $products = Product::all();
        View::render('admin/products/index', [
            'pageTitle' => 'Ürün Yönetimi - Seyitler Kimya',
            'products'  => $products,
        ], 'layouts/admin');
    }

    public function create(Request $request): void
    {
        $categories = Category::all();
        View::render('admin/products/create', [
            'pageTitle'  => 'Yeni Ürün Ekle - Seyitler Kimya',
            'categories' => $categories,
        ], 'layouts/admin');
    }

    public function store(Request $request): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/products/create'));
            return;
        }

        $titleTr = trim((string)$request->post('title_tr'));
        $slug = trim((string)$request->post('slug'));
        if (empty($slug)) {
            $slug = Product::slugify($titleTr);
        }

        // Check if slug already exists
        $existing = Product::findBySlug($slug);
        if ($existing) {
            $slug .= '-' . time();
        }

        // Image Handling
        $mainImage = trim((string)$request->post('main_image'));
        if (isset($_FILES['main_image_file']) && $_FILES['main_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['main_image_file'], 'assets/images/products/');
            if ($uploaded) {
                $mainImage = $uploaded;
            }
        }

        $featuresRaw = trim((string)$request->post('features'));
        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", $featuresRaw))));
        $featuresJson = json_encode($featuresArray, JSON_UNESCAPED_UNICODE);

        $descTr = trim((string)$request->post('description_tr')) ?: trim((string)$request->post('desc_tr'));
        $descEn = trim((string)$request->post('description_en')) ?: trim((string)$request->post('desc_en'));
        $descAr = trim((string)$request->post('description_ar')) ?: trim((string)$request->post('desc_ar'));

        $data = [
            'category_id'    => (int)$request->post('category_id'),
            'slug'           => $slug,
            'title_tr'       => $titleTr,
            'title_en'       => trim((string)$request->post('title_en')) ?: $titleTr,
            'title_ar'       => trim((string)$request->post('title_ar')) ?: $titleTr,
            'desc_tr'        => $descTr,
            'desc_en'        => $descEn,
            'desc_ar'        => $descAr,
            'main_image'     => $mainImage ?: 'assets/images/logo.png',
            'features_tr'    => $featuresJson,
            'features_en'    => $featuresJson,
            'features_ar'    => $featuresJson,
            'gallery_images' => json_encode([], JSON_UNESCAPED_UNICODE),
            'sort_order'     => (int)$request->post('sort_order'),
            'is_active'      => $request->post('is_active') ? 1 : 0,
        ];

        $newId = Product::create($data);
        Session::flash('success', 'Ürün başarıyla oluşturuldu.');
        Response::redirect(url('/podmin/products/edit/' . $newId));
    }

    public function edit(Request $request, int $id): void
    {
        $product = Product::findById($id);
        if (!$product) {
            Session::flash('error', 'Ürün bulunamadı.');
            Response::redirect(url('/podmin/products'));
            return;
        }

        // Bridge column aliases for edit view compatibility
        $product['description_tr'] = $product['desc_tr'] ?? '';
        $product['description_en'] = $product['desc_en'] ?? '';
        $product['description_ar'] = $product['desc_ar'] ?? '';

        $categories = Category::all();
        $specs = ProductTable::getByProductId($id);

        View::render('admin/products/edit', [
            'pageTitle'  => 'Ürün Düzenle: ' . Product::getTitle($product),
            'product'    => $product,
            'categories' => $categories,
            'specs'      => $specs,
        ], 'layouts/admin');
    }

    public function update(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/products/edit/' . $id));
            return;
        }

        $product = Product::findById($id);
        if (!$product) {
            Session::flash('error', 'Ürün bulunamadı.');
            Response::redirect(url('/podmin/products'));
            return;
        }

        $titleTr = trim((string)$request->post('title_tr'));
        $slug = trim((string)$request->post('slug'));
        if (empty($slug)) {
            $slug = Product::slugify($titleTr);
        }

        $mainImage = trim((string)$request->post('main_image'));
        if (isset($_FILES['main_image_file']) && $_FILES['main_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['main_image_file'], 'assets/images/products/');
            if ($uploaded) {
                $mainImage = $uploaded;
            }
        }

        $featuresRaw = trim((string)$request->post('features'));
        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", $featuresRaw))));
        $featuresJson = json_encode($featuresArray, JSON_UNESCAPED_UNICODE);

        $descTr = trim((string)$request->post('description_tr')) ?: trim((string)$request->post('desc_tr'));
        $descEn = trim((string)$request->post('description_en')) ?: trim((string)$request->post('desc_en'));
        $descAr = trim((string)$request->post('description_ar')) ?: trim((string)$request->post('desc_ar'));

        $data = [
            'category_id'    => (int)$request->post('category_id'),
            'slug'           => $slug,
            'title_tr'       => $titleTr,
            'title_en'       => trim((string)$request->post('title_en')) ?: $titleTr,
            'title_ar'       => trim((string)$request->post('title_ar')) ?: $titleTr,
            'desc_tr'        => $descTr,
            'desc_en'        => $descEn,
            'desc_ar'        => $descAr,
            'main_image'     => $mainImage ?: ($product['main_image'] ?? 'assets/images/logo.png'),
            'features_tr'    => $featuresJson,
            'features_en'    => $featuresJson,
            'features_ar'    => $featuresJson,
            'sort_order'     => (int)$request->post('sort_order'),
            'is_active'      => $request->post('is_active') ? 1 : 0,
        ];

        Product::update($id, $data);
        Session::flash('success', 'Ürün bilgileri başarıyla güncellendi.');
        Response::redirect(url('/podmin/products/edit/' . $id));
    }

    public function delete(Request $request, int $id): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/products'));
            return;
        }

        Database::delete('product_tables', 'product_id = :id', [':id' => $id]);
        Product::delete($id);

        Session::flash('success', 'Ürün ve bağlı teknik tabloları silindi.');
        Response::redirect(url('/podmin/products'));
    }

    public function addVariant(Request $request, int $productId): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/products/edit/' . $productId));
            return;
        }

        $size = trim((string)$request->post('size'));
        if (empty($size)) {
            Session::flash('error', 'Lütfen ölçü alanını doldurunuz.');
            Response::redirect(url('/podmin/products/edit/' . $productId));
            return;
        }

        ProductTable::create([
            'product_id' => $productId,
            'size'       => $size,
            'width'      => trim((string)$request->post('width')),
            'length'     => trim((string)$request->post('length')),
            'height'     => trim((string)$request->post('height')),
            'box_qty'    => (int)$request->post('box_qty') ?: 1,
            'case_qty'   => (int)$request->post('case_qty') ?: 100,
            'sort_order' => 0,
        ]);

        Session::flash('success', 'Teknik ölçü başarıyla eklendi.');
        Response::redirect(url('/podmin/products/edit/' . $productId));
    }

    public function deleteVariant(Request $request, int $variantId): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız oldu.');
            Response::redirect(url('/podmin/products'));
            return;
        }

        $variant = ProductTable::findById($variantId);
        $productId = $variant ? (int)$variant['product_id'] : 0;

        ProductTable::delete($variantId);
        Session::flash('success', 'Teknik ölçü satırı silindi.');
        Response::redirect(url('/podmin/products/edit/' . $productId));
    }

    public function addGalleryImage(Request $request, int $productId): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/podmin/products/edit/' . $productId));
            return;
        }

        $product = Product::findById($productId);
        if (!$product) {
            Response::redirect(url('/podmin/products'));
            return;
        }

        $gallery = Product::getGallery($product);
        $newUrl = trim((string)$request->post('gallery_image_url'));

        if (isset($_FILES['gallery_image_file']) && $_FILES['gallery_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploaded = $this->handleFileUpload($_FILES['gallery_image_file'], 'assets/images/products/');
            if ($uploaded) {
                $newUrl = $uploaded;
            }
        }

        if (!empty($newUrl)) {
            $gallery[] = $newUrl;
            Product::update($productId, [
                'gallery_images' => json_encode(array_values($gallery), JSON_UNESCAPED_UNICODE),
            ]);
            Session::flash('success', 'Galeriye yeni görsel eklendi.');
        }

        Response::redirect(url('/podmin/products/edit/' . $productId));
    }

    public function deleteGalleryImage(Request $request, int $productId): void
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            Session::flash('error', 'Güvenlik doğrulaması başarısız.');
            Response::redirect(url('/podmin/products/edit/' . $productId));
            return;
        }

        $product = Product::findById($productId);
        if (!$product) {
            Response::redirect(url('/podmin/products'));
            return;
        }

        $index = (int)$request->post('image_index');
        $gallery = Product::getGallery($product);

        if (isset($gallery[$index])) {
            unset($gallery[$index]);
            Product::update($productId, [
                'gallery_images' => json_encode(array_values($gallery), JSON_UNESCAPED_UNICODE),
            ]);
            Session::flash('success', 'Görsel galeriden kaldırıldı.');
        }

        Response::redirect(url('/podmin/products/edit/' . $productId));
    }

    private function handleFileUpload(array $file, string $targetDir): ?string
    {
        return \App\Core\FileUploader::uploadImage($file, $targetDir);
    }
}
