<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Yeni Ürün Ekle</h2>
            <p class="text-xs text-slate-500 mt-0.5">Kataloğa yeni medikal ürün ekleyin.</p>
        </div>
        <a href="<?= url('/admin/products') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl transition-colors">
            Geri Dön
        </a>
    </div>

    <form action="<?= url('/admin/products/store') ?>" method="POST" enctype="multipart/form-data" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori *</label>
                <select name="category_id" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= e(\App\Models\Category::getName($cat)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Slug -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">URL Slug (Otomatik oluşturulabilir)</label>
                <input type="text" name="slug" placeholder="ornek-urun-adi" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono text-xs"/>
            </div>
        </div>

        <!-- Multilingual Titles -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Ürün Başlıkları (Çok Dilli)</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Türkçe Başlık *</label>
                    <input type="text" name="title_tr" required placeholder="Nova Plast" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">İngilizce Başlık</label>
                    <input type="text" name="title_en" placeholder="Nova Plast" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Arapça Başlık</label>
                    <input type="text" name="title_ar" dir="rtl" placeholder="نوفا بلاست" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>
            </div>
        </div>

        <!-- Multilingual Descriptions -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Ürün Açıklamaları (Çok Dilli)</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Türkçe Açıklama</label>
                    <textarea name="description_tr" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">İngilizce Açıklama</label>
                    <textarea name="description_en" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Arapça Açıklama</label>
                    <textarea name="description_ar" dir="rtl" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"></textarea>
                </div>
            </div>
        </div>

        <!-- Features (Bullets) -->
        <div class="pt-4 border-t border-slate-100">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Özellikler (Her satıra bir özellik yazınız)</label>
            <textarea name="features" rows="4" placeholder="Cilt dostu yapışkan katmanı&#10;Hava geçirgen mikro gözenekli yapı&#10;Kolay yırtılabilen pratik kenar" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono text-xs"></textarea>
        </div>

        <!-- Image and Options -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4 border-t border-slate-100">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ana Görsel (Dosya Seç)</label>
                <input type="file" name="main_image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200"/>
                <div class="text-[10px] text-slate-400 mt-1">veya doğrudan dosya yolu:</div>
                <input type="text" name="main_image" placeholder="assets/images/..." class="mt-1 w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200"/>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sıralama Önceliği</label>
                <input type="number" name="sort_order" value="0" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
            </div>

            <div class="flex items-center pt-6">
                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="size-4 rounded text-brand-600 focus:ring-brand-500"/>
                    <span class="text-xs font-bold text-slate-700">Ürün Yayında Olsun</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end gap-3">
            <a href="<?= url('/admin/products') ?>" class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50">İptal</a>
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-brand-600/30 transition-all cursor-pointer">
                Ürünü Kaydet
            </button>
        </div>
    </form>
</div>
