<?php
/** @var array $categories */
?>

<div class="max-w-5xl mx-auto space-y-6 pb-16">
    
    <!-- Top Bar -->
    <div class="flex items-center justify-between pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Yeni Katalog Girişi</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Yeni Medikal Ürün Ekle</h1>
            <p class="text-xs text-slate-500 mt-0.5">Ürün adını, kategorisini, çok dilli açıklamalarını ve ana görselini tanımlayın.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?= url('/podmin/products') ?>" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-xs transition-colors flex items-center gap-1.5">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                <span>Ürün Listesine Dön</span>
            </a>
        </div>
    </div>

    <!-- Main Creation Form -->
    <form action="<?= url('/podmin/products/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- SECTION 1: TEMEL BİLGİLER -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xs">01</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Temel Bilgiler & Kategori</h3>
                    <p class="text-xs text-slate-400">Ürünün ait olduğu medikal grup ve URL yapısı</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Category Select -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Medikal Kategori *</label>
                    <select name="category_id" required class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-semibold text-slate-800">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= e(\App\Models\Category::getName($cat)) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">URL Slug (Boş bırakılırsa başlıktan üretilir)</label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-mono text-xs">/products/</span>
                        <input type="text" name="slug" placeholder="derma-fix-plaster" class="w-full pl-24 pr-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-700"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Sıralama Önceliği</label>
                    <input type="number" name="sort_order" value="0" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <!-- Active Toggle Checkbox -->
                <div class="flex items-center pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-all w-full">
                        <input type="checkbox" name="is_active" value="1" checked class="size-5 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300"/>
                        <div>
                            <span class="text-xs font-bold text-slate-800 block">Katalogda Yayında Olsun</span>
                            <span class="text-[11px] text-slate-400">İşareti kaldırırsanız ürün sitede gizlenir (taslak kalır).</span>
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
                    <h3 class="font-bold text-slate-900 text-sm">Çok Dilli Başlıklar & Açıklamalar (TR / EN / AR)</h3>
                    <p class="text-xs text-slate-400">Ürünün uluslararası dillerdeki pazarlama ve teknik tanıtım metinleri</p>
                </div>
            </div>

            <!-- Titles Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 text-[10px] font-extrabold border border-blue-200">TR</span>
                        <span>Türkçe Başlık *</span>
                    </label>
                    <input type="text" name="title_tr" required placeholder="Örn: Derma-fix Tıbbi Plaster" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-indigo-50 text-indigo-700 text-[10px] font-extrabold border border-indigo-200">EN</span>
                        <span>İngilizce Başlık</span>
                    </label>
                    <input type="text" name="title_en" placeholder="Derma-fix Medical Plaster" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-2 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold border border-emerald-200">AR</span>
                        <span>Arapça Başlık</span>
                    </label>
                    <input type="text" name="title_ar" dir="rtl" placeholder="لصقة طبية ديرما فيكس" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>
            </div>

            <!-- Descriptions Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4 border-t border-slate-100">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Türkçe Detaylı Açıklama</label>
                    <textarea name="description_tr" rows="4" placeholder="Ürün kullanım alanı, medikal standartları..." class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">İngilizce Detaylı Açıklama</label>
                    <textarea name="description_en" rows="4" placeholder="Product indications, standards..." class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Arapça Detaylı Açıklama</label>
                    <textarea name="description_ar" dir="rtl" rows="4" placeholder="مؤشرات المنتج والمعايير الطبية..." class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"></textarea>
                </div>
            </div>

            <!-- Features Bullets -->
            <div class="pt-4 border-t border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Öne Çıkan Özellikler (Her satıra 1 özellik yazınız)</label>
                <textarea name="features" rows="3" placeholder="Hipoalerjenik medikal yapışkan katmanı&#10;Röntgen ışınlarını geçirgen yapı&#10;Hava ve nem geçirgenliği sayesinde cildi terletmez" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-700"></textarea>
            </div>
        </div>

        <!-- SECTION 3: GÖRSEL & MEDYA -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">03</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Ürün Görseli & Medya</h3>
                    <p class="text-xs text-slate-400">Katalog kartlarında ve detay sayfasında görüntülenecek ana fotoğraf</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Görsel Dosyası Yükle (WEBP, PNG, JPG)</label>
                    <input type="file" name="main_image_file" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"/>
                    
                    <div class="mt-3">
                        <span class="text-[11px] text-slate-400">veya doğrudan dosya yolu / URL belirtin:</span>
                        <input type="text" name="main_image" placeholder="assets/images/TibbiPlasterler/..." class="mt-1 w-full px-3 py-2 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 text-slate-700"/>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-4">
                    <div class="size-16 rounded-xl bg-white border border-slate-200 p-1 flex items-center justify-center shrink-0">
                        <svg class="size-8 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/></svg>
                    </div>
                    <div class="text-xs text-slate-500 leading-relaxed">
                        Ürünü kaydettikten sonra teknik ölçü tablosunu ve ek galeri fotoğraflarını ürün düzenleme ekranından dilediğiniz gibi ekleyebilirsiniz.
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Bottom Save Bar -->
        <div class="p-4 bg-white/90 backdrop-blur-md rounded-2xl border border-slate-200/80 shadow-md flex items-center justify-between sticky bottom-6 z-20">
            <a href="<?= url('/podmin/products') ?>" class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 transition-colors">Vazgeç</a>
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center gap-2 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Ürünü Kaydet ve Kataloğa Ekle</span>
            </button>
        </div>

    </form>
</div>
