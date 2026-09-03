<?php
use App\Models\Product;
use App\Models\Category;

$gallery = Product::getGallery($product);
$featuresList = Product::getFeatures($product);
$featuresText = implode("\n", $featuresList);
?>

<div class="max-w-5xl mx-auto space-y-8 pb-16">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Ürün Düzenle: <?= e(Product::getTitle($product)) ?></h2>
            <p class="text-xs text-slate-500 mt-0.5">Ürün bilgilerini, teknik ölçü tablosunu ve galeri görsellerini güncelleyin.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?= url('/products/' . $product['slug']) ?>" target="_blank" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl transition-colors">
                Sitede Gör
            </a>
            <a href="<?= url('/admin/products') ?>" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl transition-colors">
                Listeye Dön
            </a>
        </div>
    </div>

    <!-- Main Product Information Form -->
    <form action="<?= url('/admin/products/update/' . $product['id']) ?>" method="POST" enctype="multipart/form-data" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori *</label>
                <select name="category_id" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (int)$product['category_id'] === (int)$cat['id'] ? 'selected' : '' ?>>
                            <?= e(Category::getName($cat)) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">URL Slug</label>
                <input type="text" name="slug" value="<?= e($product['slug']) ?>" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono text-xs"/>
            </div>
        </div>

        <!-- Multilingual Titles -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Ürün Başlıkları (Çok Dilli)</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Türkçe Başlık *</label>
                    <input type="text" name="title_tr" value="<?= e($product['title_tr'] ?? '') ?>" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">İngilizce Başlık</label>
                    <input type="text" name="title_en" value="<?= e($product['title_en'] ?? '') ?>" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Arapça Başlık</label>
                    <input type="text" name="title_ar" dir="rtl" value="<?= e($product['title_ar'] ?? '') ?>" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
            </div>
        </div>

        <!-- Multilingual Descriptions -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Ürün Açıklamaları (Çok Dilli)</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Türkçe Açıklama</label>
                    <textarea name="description_tr" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"><?= e($product['description_tr'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">İngilizce Açıklama</label>
                    <textarea name="description_en" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"><?= e($product['description_en'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Arapça Açıklama</label>
                    <textarea name="description_ar" dir="rtl" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"><?= e($product['description_ar'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Features (Bullets) -->
        <div class="pt-4 border-t border-slate-100">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Özellikler (Her satıra bir özellik)</label>
            <textarea name="features" rows="4" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono text-xs"><?= e($featuresText) ?></textarea>
        </div>

        <!-- Image and Options -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4 border-t border-slate-100 items-start">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ana Görsel</label>
                <div class="flex items-center gap-3 mb-2">
                    <div class="size-14 rounded-xl bg-slate-100 border border-slate-200 p-1 flex items-center justify-center shrink-0">
                        <img src="<?= asset($product['main_image']) ?>" alt="" class="max-h-full max-w-full object-contain"/>
                    </div>
                    <div class="text-[10px] text-slate-500 font-mono truncate"><?= e($product['main_image']) ?></div>
                </div>
                <input type="file" name="main_image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200"/>
                <input type="text" name="main_image" value="<?= e($product['main_image']) ?>" class="mt-2 w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 font-mono"/>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sıralama Önceliği</label>
                <input type="number" name="sort_order" value="<?= (int)$product['sort_order'] ?>" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
            </div>

            <div class="flex items-center pt-6">
                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" <?= !empty($product['is_active']) ? 'checked' : '' ?> class="size-4 rounded text-brand-600 focus:ring-brand-500"/>
                    <span class="text-xs font-bold text-slate-700">Ürün Yayında Olsun</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end gap-3">
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-brand-600/30 transition-all cursor-pointer">
                Değişiklikleri Kaydet
            </button>
        </div>
    </form>

    <!-- Technical Specifications Table Manager (product_tables) -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
        <div>
            <h3 class="text-base font-bold text-slate-900">Teknik Ölçü ve Paketleme Tablosu</h3>
            <p class="text-xs text-slate-500 mt-0.5">Ürüne ait ebatlar, paketleme boyutları ve koli içi adetlerini yönetin.</p>
        </div>

        <!-- Current Specs Table -->
        <div class="overflow-x-auto border border-slate-200 rounded-xl">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-3">Ölçü (Size)</th>
                        <th class="py-3 px-3">En (cm)</th>
                        <th class="py-3 px-3">Boy (cm)</th>
                        <th class="py-3 px-3">Yükseklik (cm)</th>
                        <th class="py-3 px-3">Kutu İçi Adet</th>
                        <th class="py-3 px-3">Koli İçi Adet</th>
                        <th class="py-3 px-3 text-right">İşlem</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (empty($specs)): ?>
                        <tr><td colspan="7" class="py-4 text-center text-slate-400">Henüz teknik varyant eklenmemiş.</td></tr>
                    <?php else: ?>
                        <?php foreach ($specs as $sp): ?>
                            <tr class="hover:bg-slate-50">
                                <td class="py-2.5 px-3 font-bold text-slate-900"><?= e($sp['size']) ?></td>
                                <td class="py-2.5 px-3"><?= e($sp['width']) ?></td>
                                <td class="py-2.5 px-3"><?= e($sp['length']) ?></td>
                                <td class="py-2.5 px-3"><?= e($sp['height']) ?></td>
                                <td class="py-2.5 px-3 font-semibold text-slate-900"><?= e($sp['box_qty']) ?></td>
                                <td class="py-2.5 px-3 font-semibold text-brand-700"><?= e($sp['case_qty']) ?></td>
                                <td class="py-2.5 px-3 text-right">
                                    <form action="<?= url('/admin/products/variant/delete/' . $sp['id']) ?>" method="POST" onsubmit="return confirm('Bu ölçü satırını silmek istediğinize emin misiniz?');" class="inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="text-rose-600 hover:text-rose-800 font-bold text-xs cursor-pointer">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Add New Spec Row Form -->
        <form action="<?= url('/admin/products/variant/add/' . $product['id']) ?>" method="POST" class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-4">
            <?= csrf_field() ?>
            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Yeni Ölçü Satırı Ekle</h4>
            
            <div class="grid grid-cols-2 sm:grid-cols-6 gap-3">
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Ölçü *</label>
                    <input type="text" name="size" required placeholder="5x5 cm" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">En (cm)</label>
                    <input type="text" name="width" placeholder="25" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Boy (cm)</label>
                    <input type="text" name="length" placeholder="29" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Yükseklik (cm)</label>
                    <input type="text" name="height" placeholder="32" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Kutu İçi</label>
                    <input type="number" name="box_qty" value="1" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Koli İçi</label>
                    <input type="number" name="case_qty" value="100" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300"/>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-black text-white text-xs font-bold rounded-lg cursor-pointer transition-colors">
                    Ölçüyü Tabloya Ekle
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery Images Manager -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
        <div>
            <h3 class="text-base font-bold text-slate-900">Ürün Galerisi Görselleri</h3>
            <p class="text-xs text-slate-500 mt-0.5">Ürün detay sayfasında gösterilecek ek görselleri yönetin.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
            <?php foreach ($gallery as $gIdx => $gImg): ?>
                <div class="relative group rounded-xl border border-slate-200 aspect-square p-2 bg-slate-50 flex items-center justify-center overflow-hidden">
                    <img src="<?= asset($gImg) ?>" alt="" class="max-h-full max-w-full object-contain"/>
                    <form action="<?= url('/admin/products/gallery/delete/' . $product['id']) ?>" method="POST" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <?= csrf_field() ?>
                        <input type="hidden" name="image_index" value="<?= $gIdx ?>"/>
                        <button type="submit" class="p-2 bg-rose-600 hover:bg-rose-700 text-white rounded-full transition-colors cursor-pointer" title="Görseli Kaldır">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Add Image to Gallery Form -->
        <form action="<?= url('/admin/products/gallery/add/' . $product['id']) ?>" method="POST" enctype="multipart/form-data" class="bg-slate-50 border border-slate-200 rounded-xl p-4 flex flex-col sm:flex-row items-center gap-4">
            <?= csrf_field() ?>
            <div class="flex-1 w-full">
                <input type="file" name="gallery_image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-white file:text-slate-700 hover:file:bg-slate-100"/>
            </div>
            <div class="flex-1 w-full">
                <input type="text" name="gallery_image_url" placeholder="veya dosya yolu (assets/images/...)" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300 font-mono"/>
            </div>
            <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-slate-900 hover:bg-black text-white text-xs font-bold rounded-lg cursor-pointer shrink-0">
                Galeriye Ekle
            </button>
        </form>
    </div>

</div>
