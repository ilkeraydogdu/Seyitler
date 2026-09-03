<?php
use App\Models\Category;

/** @var array $categories */
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Ürün Grupları & Sınıflandırma</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Kategori Yönetimi</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Katalogda yer alan tıbbi grupları, çok dilli isimlerini ve sıralama önceliklerini yönetin.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-extrabold border border-emerald-200/60">
                <?= count($categories) ?> Kayıtlı Kategori
            </span>
        </div>
    </div>

    <!-- Grid: Left List + Right Creation Panel -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Category List (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden flex flex-col">
            <div class="p-5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="size-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <span class="font-bold text-xs uppercase tracking-wider text-slate-800">Mevcut Kategoriler</span>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($categories)): ?>
                    <div class="p-12 text-center text-xs text-slate-400 font-medium">Henüz kategori eklenmemiş.</div>
                <?php else: ?>
                    <?php foreach ($categories as $cat): ?>
                        <div class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors group">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-900 text-sm group-hover:text-emerald-700 transition-colors"><?= e($cat['name_tr']) ?></span>
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-500 font-mono text-[10px]">Sıra: <?= (int)$cat['sort_order'] ?></span>
                                </div>
                                <div class="text-[11px] text-slate-400 flex flex-wrap items-center gap-3">
                                    <span class="flex items-center gap-1">
                                        <span class="px-1 py-0.2 rounded bg-indigo-50 text-indigo-700 font-bold text-[9px]">EN</span>
                                        <span class="text-slate-600 font-medium"><?= e($cat['name_en'] ?: '-') ?></span>
                                    </span>
                                    <span>&bull;</span>
                                    <span class="flex items-center gap-1">
                                        <span class="px-1 py-0.2 rounded bg-emerald-50 text-emerald-700 font-bold text-[9px]">AR</span>
                                        <span class="text-slate-600 font-medium" dir="rtl"><?= e($cat['name_ar'] ?: '-') ?></span>
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 shrink-0">
                                <a href="<?= url('/products?category=' . $cat['id']) ?>" target="_blank" class="p-2 text-slate-400 hover:text-emerald-700 rounded-xl hover:bg-emerald-50 transition-colors" title="Kategoriyi Sitede Aç">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                </a>
                                <form action="<?= url('/podmin/categories/delete/' . $cat['id']) ?>" method="POST" onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz? Kategorideki ürünler kategorisiz olarak listelenecektir.');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 rounded-xl hover:bg-rose-50 transition-colors cursor-pointer" title="Kategoriyi Sil">
                                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Column: Add Category Form (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-7 space-y-5 sticky top-28">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Yeni Kategori Tanımla</h3>
                    <p class="text-[11px] text-slate-400">Ürün kataloğu için yeni grup ekleyin</p>
                </div>
            </div>
            
            <form action="<?= url('/podmin/categories/store') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-blue-50 text-blue-700 text-[10px] font-extrabold border border-blue-200">TR</span>
                        <span>Türkçe Kategori Adı *</span>
                    </label>
                    <input type="text" name="name_tr" required placeholder="Örn: Cerrahi Örtüler & Setler" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-indigo-50 text-indigo-700 text-[10px] font-extrabold border border-indigo-200">EN</span>
                        <span>İngilizce Kategori Adı</span>
                    </label>
                    <input type="text" name="name_en" placeholder="Surgical Drapes & Sets" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold border border-emerald-200">AR</span>
                        <span>Arapça Kategori Adı</span>
                    </label>
                    <input type="text" name="name_ar" dir="rtl" placeholder="الستائر الجراحية والمجموعات" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Sıralama Önceliği</label>
                    <input type="number" name="sort_order" value="0" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-800"/>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-[1.02] active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>Kategoriyi Kaydet</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
