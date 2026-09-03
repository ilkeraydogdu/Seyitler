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

<div class="space-y-4 max-w-7xl mx-auto">

    <!-- Compact Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white px-4 py-3 rounded-xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center gap-2.5">
            <span class="size-2 rounded-full bg-emerald-500 shrink-0 animate-pulse"></span>
            <div>
                <h2 class="text-sm font-bold text-slate-800 tracking-tight">Sistem Özeti & Kontrol Merkezi</h2>
                <p class="text-[11px] text-slate-400 font-normal">Ürün kataloğu, yatırımcı belgeleri ve gelen mesajların anlık durumu.</p>
            </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
            <a href="<?= url('/podmin/products/create') ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#0AA64D] hover:bg-[#088b40] text-white text-xs font-semibold rounded-lg shadow-xs transition-colors">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Yeni Ürün</span>
            </a>
            <a href="<?= url('/podmin/investors') ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold rounded-lg border border-slate-200 transition-colors">
                <svg width="14" height="14" class="text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                <span>Belge Ekle</span>
            </a>
        </div>
    </div>

    <!-- Minimal 4 Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        
        <!-- Metric: Products -->
        <div class="bg-white rounded-xl p-3.5 sm:p-4 border border-slate-200/80 shadow-xs hover:border-emerald-300 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Ürün Sayısı</span>
                <div class="size-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-100">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                </div>
            </div>
            <div class="text-xl sm:text-2xl font-bold text-slate-900 mt-1"><?= $productCount ?></div>
            <div class="mt-1 text-[11px] text-emerald-700 font-medium flex items-center gap-1">
                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                <span>Aktif Katalog</span>
            </div>
        </div>

        <!-- Metric: Categories -->
        <div class="bg-white rounded-xl p-3.5 sm:p-4 border border-slate-200/80 shadow-xs hover:border-blue-300 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Kategoriler</span>
                <div class="size-7 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center shrink-0 border border-blue-100">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                </div>
            </div>
            <div class="text-xl sm:text-2xl font-bold text-slate-900 mt-1"><?= $categoryCount ?></div>
            <div class="mt-1 text-[11px] text-blue-700 font-medium flex items-center gap-1">
                <span class="size-1.5 rounded-full bg-blue-500"></span>
                <span>Ürün Grubu</span>
            </div>
        </div>

        <!-- Metric: Documents -->
        <div class="bg-white rounded-xl p-3.5 sm:p-4 border border-slate-200/80 shadow-xs hover:border-amber-300 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Yatırımcı Dosyaları</span>
                <div class="size-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center shrink-0 border border-amber-100">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                </div>
            </div>
            <div class="text-xl sm:text-2xl font-bold text-slate-900 mt-1"><?= $documentCount ?></div>
            <div class="mt-1 text-[11px] text-amber-700 font-medium flex items-center gap-1">
                <span class="size-1.5 rounded-full bg-amber-500"></span>
                <span>PDF & Rapor</span>
            </div>
        </div>

        <!-- Metric: Messages -->
        <div class="bg-white rounded-xl p-3.5 sm:p-4 border border-slate-200/80 shadow-xs hover:border-rose-300 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Gelen Mesajlar</span>
                <div class="size-7 rounded-lg bg-rose-50 text-rose-700 flex items-center justify-center shrink-0 border border-rose-100">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                </div>
            </div>
            <div class="text-xl sm:text-2xl font-bold text-slate-900 mt-1"><?= $messageCount ?></div>
            <div class="mt-1 text-[11px] font-medium flex items-center gap-1">
                <?php if ($unreadCount > 0): ?>
                    <span class="text-rose-600 font-semibold"><?= $unreadCount ?> okunmamış mesaj</span>
                <?php else: ?>
                    <span class="text-slate-500">Tümü Okundu</span>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Main Content Split (Compact & Scannable) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
        
        <!-- Left: Recent Products (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-2">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    <h3 class="font-bold text-xs uppercase tracking-wider text-slate-700">Son Eklenen Ürünler</h3>
                </div>
                <a href="<?= url('/podmin/products') ?>" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800 transition-colors flex items-center gap-1">
                    <span>Tüm Liste (<?= $productCount ?>)</span>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($recentProducts)): ?>
                    <div class="p-8 text-center text-sm text-slate-400 font-medium">Kayıtlı ürün bulunmuyor.</div>
                <?php else: ?>
                    <?php foreach ($recentProducts as $prod): ?>
                        <div class="px-5 py-3 flex items-center justify-between hover:bg-slate-50/70 transition-colors">
                            <div class="flex items-center gap-3 overflow-hidden pr-2">
                                <div class="size-10 rounded-xl bg-slate-50 border border-slate-200/80 p-1 flex items-center justify-center shrink-0">
                                    <img src="<?= asset($prod['main_image']) ?>" alt="<?= e($prod['title_tr']) ?>" class="size-8 object-contain"/>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="text-sm font-bold text-slate-800 truncate"><?= e($prod['title_tr']) ?></div>
                                    <div class="text-xs text-slate-500 truncate flex items-center gap-2 mt-0.5">
                                        <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 font-medium text-xs">
                                            <?= e($prod['category_name_tr'] ?? 'Genel') ?>
                                        </span>
                                        <span class="font-mono text-xs text-slate-400">/<?= e($prod['slug']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <a href="<?= url('/podmin/products/edit/' . $prod['id']) ?>" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 hover:text-emerald-700 bg-slate-50 hover:bg-emerald-50 border border-slate-200 transition-all">
                                    Düzenle
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Recent Messages (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-2">
                    <span class="size-2 rounded-full bg-blue-500"></span>
                    <h3 class="font-bold text-xs uppercase tracking-wider text-slate-700">İletişim Mesajları</h3>
                </div>
                <a href="<?= url('/podmin/messages') ?>" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800 transition-colors flex items-center gap-1">
                    <span>Gelen Kutusu</span>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($recentMessages)): ?>
                    <div class="p-8 text-center text-sm text-slate-400 font-medium">Henüz yeni mesaj bulunmuyor.</div>
                <?php else: ?>
                    <?php foreach ($recentMessages as $msg): ?>
                        <div class="px-5 py-3 hover:bg-slate-50/70 transition-colors">
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-sm font-bold text-slate-800 truncate"><?= e($msg['name']) ?></span>
                                <span class="text-xs text-slate-400 shrink-0 font-mono"><?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?></span>
                            </div>
                            <div class="text-xs text-slate-500 truncate mt-0.5"><?= e($msg['email']) ?></div>
                            <p class="text-xs text-slate-600 mt-1.5 line-clamp-1 leading-relaxed bg-slate-50/80 px-2.5 py-1 rounded-md border border-slate-100">
                                <?= e($msg['message']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
