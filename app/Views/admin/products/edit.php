<?php
use App\Models\Product;
use App\Models\Category;

/** @var array $product */
/** @var array $categories */
/** @var array $specs */

$gallery = Product::getGallery($product);
$featuresList = Product::getFeatures($product);
$featuresText = implode("\n", $featuresList);
$title = Product::getTitle($product);
$mainImg = Product::getImage($product);
?>

<div class="max-w-5xl mx-auto space-y-8 pb-16">
    
    <!-- Header with Quick Action & Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Ürün Düzenleme Paneli</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">
                <?= e($title) ?>
            </h1>
            <p class="text-xs text-slate-500 mt-0.5">Ürün bilgilerini, çok dilli metinleri, teknik ölçü tablosunu ve galeri görsellerini güncelleyin.</p>
        </div>
        <div class="flex items-center gap-2.5 shrink-0">
            <a href="<?= url('/products/' . $product['slug']) ?>" target="_blank" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-xs transition-all flex items-center gap-1.5 hover:text-emerald-700">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                <span>Canlı Sitede Gör</span>
            </a>
            <a href="<?= url('/podmin/products') ?>" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                Listeye Dön
            </a>
        </div>
    </div>

    <!-- MAIN PRODUCT INFORMATION FORM -->
    <form action="<?= url('/podmin/products/update/' . $product['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- SECTION 1: TEMEL BİLGİLER & KATEGORİ -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xs">01</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Temel Bilgiler & Kategori</h3>
                    <p class="text-xs text-slate-400">Ürünün ait olduğu medikal grup ve URL slug yapısı</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Medikal Kategori *</label>
                    <select name="category_id" required class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-semibold text-slate-800">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (int)$product['category_id'] === (int)$cat['id'] ? 'selected' : '' ?>>
                                <?= e(Category::getName($cat)) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">URL Slug *</label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-mono text-xs">/products/</span>
                        <input type="text" name="slug" value="<?= e($product['slug']) ?>" required class="w-full pl-24 pr-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-800 font-semibold"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Sıralama Önceliği</label>
                    <input type="number" name="sort_order" value="<?= (int)$product['sort_order'] ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800 font-semibold"/>
                </div>

                <div class="flex items-center pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-all w-full">
                        <input type="checkbox" name="is_active" value="1" <?= !empty($product['is_active']) ? 'checked' : '' ?> class="size-5 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300"/>
                        <div>
                            <span class="text-xs font-bold text-slate-800 block">Katalogda Yayında Olsun</span>
                            <span class="text-[11px] text-slate-400">İşaretliyken ürün anasayfada ve katalogda görünür.</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- SECTION 2: ÇOK DİLLİ BAŞLIKLAR & AÇIKLAMALAR -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-xs">02</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Çok Dilli Başlıklar & Açıklamalar</h3>
                    <p class="text-xs text-slate-400">Türkçe, İngilizce ve Arapça dillerine özel pazarlama metinleri</p>
                </div>
            </div>

            <!-- Titles Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 text-[10px] font-extrabold border border-blue-200">TR</span>
                        <span>Türkçe Başlık *</span>
                    </label>
                    <input type="text" name="title_tr" value="<?= e($product['title_tr'] ?? '') ?>" required class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-indigo-50 text-indigo-700 text-[10px] font-extrabold border border-indigo-200">EN</span>
                        <span>İngilizce Başlık</span>
                    </label>
                    <input type="text" name="title_en" value="<?= e($product['title_en'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold border border-emerald-200">AR</span>
                        <span>Arapça Başlık</span>
                    </label>
                    <input type="text" name="title_ar" dir="rtl" value="<?= e($product['title_ar'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>
            </div>

            <!-- Descriptions Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4 border-t border-slate-100">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Türkçe Açıklama</label>
                    <textarea name="description_tr" rows="4" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"><?= e($product['description_tr'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">İngilizce Açıklama</label>
                    <textarea name="description_en" rows="4" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"><?= e($product['description_en'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Arapça Açıklama</label>
                    <textarea name="description_ar" dir="rtl" rows="4" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"><?= e($product['description_ar'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- Features Bullets -->
            <div class="pt-4 border-t border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Özellikler (Her satıra bir özellik yazınız)</label>
                <textarea name="features" rows="4" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-700"><?= e($featuresText) ?></textarea>
            </div>
        </div>

        <!-- SECTION 3: ANA GÖRSEL -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">03</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Ürün Ana Görseli</h3>
                    <p class="text-xs text-slate-400">Ürünün birincil yüksek çözünürlüklü ambalaj veya ürün fotoğrafı</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <!-- Preview Box -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex flex-col items-center justify-center text-center">
                    <div class="size-24 rounded-2xl bg-white border border-slate-200 p-2 flex items-center justify-center shadow-xs mb-2">
                        <img id="main-image-preview" src="<?= $mainImg ?>" alt="" class="max-h-full max-w-full object-contain"/>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-500 truncate max-w-full font-mono"><?= e($product['main_image']) ?></span>
                </div>

                <!-- Upload and Direct Path -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Yeni Görsel Yükle (WEBP, PNG, JPG)</label>
                        <input type="file" name="main_image_file" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Mevcut Dosya Yolu</label>
                        <input type="text" name="main_image" value="<?= e($product['main_image']) ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 font-mono text-slate-700"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Save Action Bar -->
        <div class="p-4 bg-white/90 backdrop-blur-md rounded-2xl border border-slate-200/80 shadow-md flex items-center justify-between sticky bottom-6 z-20">
            <span class="text-xs text-slate-400 hidden sm:inline">Değişiklikleri kaydettikten sonra canlı sitede anında güncellenir.</span>
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Ürün Değişikliklerini Kaydet</span>
            </button>
        </div>
    </form>

    <!-- ============================================================== -->
    <!-- SECTION 4: TEKNİK ÖLÇÜ & PAKETLEME TABLOSU (product_tables) -->
    <!-- ============================================================== -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="size-9 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-xs">04</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Teknik Ölçü ve Paketleme Tablosu</h3>
                    <p class="text-xs text-slate-400">Ürüne ait ebatlar, kutu/koli adetleri ve paket boyutları (Katalog detayında tablo olarak gösterilir)</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full bg-purple-50 text-purple-700 font-extrabold text-xs border border-purple-200/60">
                <?= count($specs) ?> Kayıtlı Varyant
            </span>
        </div>

        <!-- Current Specs Table -->
        <div class="overflow-x-auto border border-slate-200/80 rounded-2xl">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50/80 text-slate-600 font-bold uppercase tracking-wider border-b border-slate-200/80">
                    <tr>
                        <th class="py-3.5 px-4 font-extrabold">Ölçü (Size)</th>
                        <th class="py-3.5 px-4">En (cm)</th>
                        <th class="py-3.5 px-4">Boy (cm)</th>
                        <th class="py-3.5 px-4">Yükseklik (cm)</th>
                        <th class="py-3.5 px-4 text-center">Kutu İçi Adet</th>
                        <th class="py-3.5 px-4 text-center">Koli İçi Adet</th>
                        <th class="py-3.5 px-4 text-right">İşlem</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (empty($specs)): ?>
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 font-medium">Bu ürüne ait henüz teknik ölçü tablosu tanımlanmamış.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($specs as $s): ?>
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="py-3 px-4 font-bold text-slate-900"><?= e($s['size']) ?></td>
                                <td class="py-3 px-4 font-mono text-slate-600"><?= e($s['width_cm'] ?: '-') ?></td>
                                <td class="py-3 px-4 font-mono text-slate-600"><?= e($s['length_cm'] ?: '-') ?></td>
                                <td class="py-3 px-4 font-mono text-slate-600"><?= e($s['height_cm'] ?: '-') ?></td>
                                <td class="py-3 px-4 text-center font-bold text-slate-800"><?= (int)$s['box_qty'] ?></td>
                                <td class="py-3 px-4 text-center font-bold text-emerald-700"><?= (int)$s['case_qty'] ?></td>
                                <td class="py-3 px-4 text-right">
                                    <form action="<?= url('/podmin/products/variant/delete/' . $s['id']) ?>" method="POST" onsubmit="return confirm('Bu ölçü satırını silmek istediğinize emin misiniz?');" class="inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors cursor-pointer" title="Ölçüyü Sil">
                                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Add New Variant Row Form -->
        <form action="<?= url('/podmin/products/variant/add/' . $product['id']) ?>" method="POST" class="p-5 rounded-2xl bg-slate-50/80 border border-slate-200/80 space-y-4">
            <?= csrf_field() ?>
            <div class="text-xs font-extrabold uppercase tracking-wider text-slate-700 flex items-center gap-2">
                <svg class="size-4 text-purple-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Yeni Ölçü / Varyant Satırı Ekle</span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-6 gap-3">
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">Ölçü *</label>
                    <input type="text" name="size" required placeholder="5cm x 5m" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-semibold"/>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">En (cm)</label>
                    <input type="number" step="0.1" name="width_cm" placeholder="5" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono"/>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">Boy (cm)</label>
                    <input type="number" step="0.1" name="length_cm" placeholder="500" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono"/>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">Yükseklik</label>
                    <input type="number" step="0.1" name="height_cm" placeholder="-" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono"/>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">Kutu İçi Adet</label>
                    <input type="number" name="box_qty" value="1" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono"/>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">Koli İçi Adet</label>
                    <input type="number" name="case_qty" value="24" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono"/>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs rounded-xl shadow-xs transition-all flex items-center gap-1.5 cursor-pointer">
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    <span>Satırı Tabloya Ekle</span>
                </button>
            </div>
        </form>
    </div>

    <!-- ============================================================== -->
    <!-- SECTION 5: ÜRÜN GALERİSİ GÖRSELLERİ -->
    <!-- ============================================================== -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="size-9 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-xs">05</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Ürün Fotoğraf Galerisi</h3>
                    <p class="text-xs text-slate-400">Ürün detay sayfasında carousel olarak gösterilecek ek fotoğraflar</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full bg-teal-50 text-teal-700 font-extrabold text-xs border border-teal-200/60">
                <?= count($gallery) ?> Galeri Fotoğrafı
            </span>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
            <?php foreach ($gallery as $idx => $gImg): ?>
                <div class="p-2 rounded-2xl border border-slate-200/80 bg-slate-50/50 flex flex-col items-center justify-between relative group shadow-2xs">
                    <div class="size-20 rounded-xl bg-white p-1 flex items-center justify-center overflow-hidden">
                        <img src="<?= asset($gImg) ?>" alt="" class="max-h-full max-w-full object-contain"/>
                    </div>
                    <form action="<?= url('/podmin/products/gallery/delete/' . $product['id']) ?>" method="POST" onsubmit="return confirm('Bu galeri görselini silmek istediğinize emin misiniz?');" class="mt-2">
                        <?= csrf_field() ?>
                        <input type="hidden" name="image_path" value="<?= e($gImg) ?>"/>
                        <button type="submit" class="text-[10px] text-rose-600 hover:text-rose-800 font-bold hover:underline flex items-center gap-1 cursor-pointer">
                            <svg class="size-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                            <span>Kaldır</span>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Add Image to Gallery -->
        <form action="<?= url('/podmin/products/gallery/add/' . $product['id']) ?>" method="POST" enctype="multipart/form-data" class="p-5 rounded-2xl bg-slate-50/80 border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
            <?= csrf_field() ?>
            <div class="w-full sm:flex-1">
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Yeni Galeri Fotoğrafı Seç</label>
                <input type="file" name="gallery_file" accept="image/*" required class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 cursor-pointer"/>
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs rounded-xl shadow-xs transition-all flex items-center justify-center gap-1.5 cursor-pointer shrink-0">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Fotoğrafı Galeriye Ekle</span>
            </button>
        </form>
    </div>

</div>
