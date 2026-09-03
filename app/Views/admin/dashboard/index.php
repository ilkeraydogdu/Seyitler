<?php
use App\Models\Product;
use App\Models\Category;

/** @var int $productCount */
/** @var int $categoryCount */
/** @var int $documentCount */
/** @var int $messageCount */
/** @var int $unreadCount */
/** @var array $recentMessages */
/** @var array $recentProducts */
?>

<div class="space-y-6 max-w-7xl mx-auto">

    <!-- ============================================================== -->
    <!-- 1. SOFT WELCOME BANNER (Clean, Light, Corporate) -->
    <!-- ============================================================== -->
    <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/80 shadow-soft relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-5">
            <div>
                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold mb-2 border border-emerald-200/50">
                    <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Aktif Oturum &bull; Yönetim Portalı</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-display font-bold text-slate-900 tracking-tight">
                    Hoş Geldiniz, Seyitler Kimya Yönetim Paneli
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1 max-w-2xl font-normal leading-relaxed">
                    Tıbbi plasterler, teknik ölçü tabloları, yatırımcı belgeleri ve site içeriklerini tek noktadan yönetebilirsiniz.
                </p>
            </div>

            <!-- Quick Actions -->
            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                <a href="<?= url('/podmin/products/create') ?>" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl shadow-xs transition-all">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    <span>Yeni Ürün Ekle</span>
                </a>
                <a href="<?= url('/podmin/investors') ?>" class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold rounded-xl border border-slate-200 transition-all">
                    <svg class="size-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    <span>Belge Yükle</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 2. SOFT METRIC CARDS -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Metric: Products -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-soft hover:border-emerald-300 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500">Aktif Ürünler</span>
                <div class="size-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-100">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-display font-bold text-slate-900 mt-2.5"><?= $productCount ?></div>
            <div class="mt-2 text-[11px] font-medium text-emerald-700 flex items-center gap-1.5">
                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                <span>Tüm katalog yayında</span>
            </div>
        </div>

        <!-- Metric: Categories -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-soft hover:border-blue-300 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500">Kategoriler</span>
                <div class="size-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0 border border-blue-100">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-display font-bold text-slate-900 mt-2.5"><?= $categoryCount ?></div>
            <div class="mt-2 text-[11px] font-medium text-blue-700 flex items-center gap-1.5">
                <span class="size-1.5 rounded-full bg-blue-500"></span>
                <span>Aktif ürün grupları</span>
            </div>
        </div>

        <!-- Metric: Documents -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-soft hover:border-amber-300 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500">Yatırımcı Belgeleri</span>
                <div class="size-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center shrink-0 border border-amber-100">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-display font-bold text-slate-900 mt-2.5"><?= $documentCount ?></div>
            <div class="mt-2 text-[11px] font-medium text-amber-700 flex items-center gap-1.5">
                <span class="size-1.5 rounded-full bg-amber-500"></span>
                <span>KAP & Genel Kurul PDF</span>
            </div>
        </div>

        <!-- Metric: Messages -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-soft hover:border-rose-300 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500">İletişim Mesajları</span>
                <div class="size-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center shrink-0 border border-rose-100">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-display font-bold text-slate-900 mt-2.5"><?= $messageCount ?></div>
            <div class="mt-2 text-[11px] font-medium text-slate-500 flex items-center gap-1.5">
                <?php if ($unreadCount > 0): ?>
                    <span class="text-rose-600 font-semibold"><?= $unreadCount ?> okunmamış mesaj</span>
                <?php else: ?>
                    <span class="text-emerald-700 font-medium">Tüm mesajlar okundu</span>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- 3. MAIN CONTENT SPLIT (Recent Products & Recent Messages) -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- Left: Recent Products (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 shadow-soft overflow-hidden">
            <div class="p-4 sm:p-5 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    <h3 class="font-bold text-xs uppercase tracking-wider text-slate-800">Yayındaki Son Ürünler</h3>
                </div>
                <a href="<?= url('/podmin/products') ?>" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800 transition-colors flex items-center gap-1">
                    <span>Tümünü Gör (<?= $productCount ?>)</span>
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($recentProducts)): ?>
                    <div class="p-8 text-center text-xs text-slate-400 font-medium">Henüz ürün eklenmemiş.</div>
                <?php else: ?>
                    <?php foreach ($recentProducts as $prod): ?>
                        <div class="p-4 flex items-center justify-between hover:bg-slate-50/70 transition-colors">
                            <div class="flex items-center gap-3 overflow-hidden pr-3">
                                <div class="size-10 rounded-xl bg-slate-50 border border-slate-200/70 p-1 flex items-center justify-center shrink-0">
                                    <img src="<?= asset($prod['main_image']) ?>" alt="<?= e($prod['title_tr']) ?>" class="size-8 object-contain"/>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="text-xs font-bold text-slate-900 truncate"><?= e($prod['title_tr']) ?></div>
                                    <div class="text-[11px] text-slate-400 truncate mt-0.5 flex items-center gap-2">
                                        <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 font-medium text-[10px]">
                                            <?= e($prod['category_name_tr'] ?? 'Genel') ?>
                                        </span>
                                        <span class="font-mono text-[10px] text-slate-400">/<?= e($prod['slug']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <a href="<?= url('/podmin/products/edit/' . $prod['id']) ?>" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-emerald-700 bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-200 transition-all">
                                    Düzenle
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Recent Messages (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 shadow-soft overflow-hidden">
            <div class="p-4 sm:p-5 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="size-2 rounded-full bg-blue-500"></span>
                    <h3 class="font-bold text-xs uppercase tracking-wider text-slate-800">Gelen İletişim Mesajları</h3>
                </div>
                <a href="<?= url('/podmin/messages') ?>" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800 transition-colors flex items-center gap-1">
                    <span>Mesaj Kutusu</span>
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($recentMessages)): ?>
                    <div class="p-8 text-center text-xs text-slate-400 font-medium">Henüz gelen mesaj yok.</div>
                <?php else: ?>
                    <?php foreach ($recentMessages as $msg): ?>
                        <div class="p-4 hover:bg-slate-50/70 transition-colors">
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-xs font-bold text-slate-900 truncate"><?= e($msg['name']) ?></span>
                                <span class="text-[10px] text-slate-400 shrink-0 font-mono"><?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?></span>
                            </div>
                            <div class="text-[11px] text-slate-500 truncate mt-0.5"><?= e($msg['email']) ?></div>
                            <p class="text-xs text-slate-600 mt-2 line-clamp-2 leading-relaxed bg-slate-50/60 p-2.5 rounded-xl border border-slate-100">
                                <?= e($msg['message']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
