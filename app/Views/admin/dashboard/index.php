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

<div class="space-y-8">

    <!-- ============================================================== -->
    <!-- 1. EXECUTIVE WELCOME BANNER WITH AMBIENT GRADIENTS -->
    <!-- ============================================================== -->
    <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-[#0B0F19] via-[#0D1527] to-[#06261D] text-white shadow-xl relative overflow-hidden border border-white/5">
        <div class="absolute -right-12 -bottom-12 size-72 rounded-full bg-emerald-500/15 blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-1/4 size-48 rounded-full bg-teal-400/10 blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 text-[11px] font-bold mb-3.5 border border-emerald-500/25">
                    <span class="size-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Canlı Üretim &bull; Enterprise Executive Portal</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-display font-extrabold text-white tracking-tight">
                    Seyitler Kimya Yönetim Portalı
                </h2>
                <p class="text-slate-300 text-xs sm:text-sm mt-1.5 max-w-2xl font-normal leading-relaxed">
                    Tıbbi flasterler, yara örtüleri, teknik ölçü tabloları, yatırımcı ilişkileri ve çok dilli içeriklerinizi merkezi ve güvenli altyapıdan yönetin.
                </p>
            </div>

            <!-- Quick Action Hub -->
            <div class="flex flex-wrap items-center gap-3 shrink-0">
                <a href="<?= url('/podmin/products/create') ?>" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-emerald-500 to-brand-600 hover:from-emerald-600 hover:to-brand-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-emerald-500/25 transition-all hover:scale-105 active:scale-95 cursor-pointer">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    <span>Yeni Ürün Ekle</span>
                </a>
                <a href="<?= url('/podmin/investors') ?>" class="inline-flex items-center gap-2 px-4 py-3 bg-white/10 hover:bg-white/15 text-white text-xs font-semibold rounded-xl border border-white/10 transition-all">
                    <svg class="size-4 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    <span>Belge Yükle</span>
                </a>
                <a href="<?= url('/') ?>" target="_blank" class="inline-flex items-center gap-2 px-4 py-3 bg-white/10 hover:bg-white/15 text-white text-xs font-semibold rounded-xl border border-white/10 transition-all" title="Canlı Siteyi Yeni Sekmede Aç">
                    <svg class="size-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 2. HIGH-IMPACT METRIC CARDS (KPIs) -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Metric: Products -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-subtle hover:shadow-card hover:border-emerald-500/40 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Aktif Ürünler</span>
                <div class="size-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-xs">
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                </div>
            </div>
            <div class="text-3xl font-display font-extrabold text-slate-900 mt-3"><?= $productCount ?></div>
            <div class="mt-3 flex items-center gap-1.5 text-xs font-semibold text-emerald-600">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Tüm katalog yayında ve listeleniyor</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-full w-full"></div>
            </div>
        </div>

        <!-- Metric: Categories -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-subtle hover:shadow-card hover:border-blue-500/40 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Medikal Kategoriler</span>
                <div class="size-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-xs">
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                </div>
            </div>
            <div class="text-3xl font-display font-extrabold text-slate-900 mt-3"><?= $categoryCount ?></div>
            <div class="mt-3 flex items-center gap-1.5 text-xs font-semibold text-blue-600">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Aktif ürün grupları</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-full w-full"></div>
            </div>
        </div>

        <!-- Metric: Documents -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-subtle hover:shadow-card hover:border-amber-500/40 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Yatırımcı Belgeleri</span>
                <div class="size-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-xs">
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                </div>
            </div>
            <div class="text-3xl font-display font-extrabold text-slate-900 mt-3"><?= $documentCount ?></div>
            <div class="mt-3 flex items-center gap-1.5 text-xs font-semibold text-amber-600">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>SPK & Faaliyet Raporları</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 h-full w-full"></div>
            </div>
        </div>

        <!-- Metric: Messages -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-subtle hover:shadow-card hover:border-rose-500/40 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">İletişim Talepleri</span>
                <div class="size-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-xs">
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                </div>
            </div>
            <div class="text-3xl font-display font-extrabold text-slate-900 mt-3"><?= $messageCount ?></div>
            <div class="mt-3 flex items-center gap-1.5 text-xs font-bold <?= $unreadCount > 0 ? 'text-rose-600' : 'text-slate-500' ?>">
                <?php if ($unreadCount > 0): ?>
                    <span class="size-2 rounded-full bg-rose-500 animate-pulse"></span>
                    <span><?= $unreadCount ?> yeni okunmamış talep var</span>
                <?php else: ?>
                    <svg class="size-4 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    <span>Tüm talepler yanıtlandı</span>
                <?php endif; ?>
            </div>
            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                <div class="<?= $unreadCount > 0 ? 'bg-gradient-to-r from-rose-500 to-pink-500' : 'bg-slate-300' ?> h-full w-full"></div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- 3. RECENT ACTIVITIES & SYSTEM CONTROL -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Card: Recent Messages -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <div class="size-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Gelen İletişim & Bayi Talepleri</h3>
                        <p class="text-[11px] text-slate-400">Web sitesi formundan ulaşan son mesajlar</p>
                    </div>
                </div>
                <a href="<?= url('/podmin/messages') ?>" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 hover:underline flex items-center gap-1">
                    <span>Tümünü Gör</span>
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>
            
            <div class="divide-y divide-slate-100 flex-1">
                <?php if (empty($recentMessages)): ?>
                    <div class="p-12 text-center text-xs text-slate-400 font-medium">Gelen iletişim talebi bulunmamaktadır.</div>
                <?php else: ?>
                    <?php foreach ($recentMessages as $msg): ?>
                        <a href="<?= url('/podmin/messages/' . $msg['id']) ?>" class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors group">
                            <div class="flex items-center gap-3.5 overflow-hidden pr-4">
                                <div class="size-10 rounded-xl <?= empty($msg['is_read']) ? 'bg-rose-50 text-rose-600 border border-rose-200/60' : 'bg-slate-100 text-slate-600' ?> flex items-center justify-center text-xs font-extrabold shrink-0">
                                    <?= strtoupper(substr($msg['name'] ?? 'M', 0, 1)) ?>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-slate-900 truncate group-hover:text-emerald-700 transition-colors"><?= e($msg['name']) ?></span>
                                        <?php if (empty($msg['is_read'])): ?>
                                            <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-rose-500 text-white shrink-0 shadow-xs">YENİ</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-xs text-slate-500 truncate mt-0.5"><?= e($msg['subject'] ?: $msg['message']) ?></div>
                                </div>
                            </div>
                            <div class="text-[11px] text-slate-400 font-medium shrink-0">
                                <?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Card: Recent Products -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <div class="size-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Son Düzenlenen Medikal Ürünler</h3>
                        <p class="text-[11px] text-slate-400">Katalogda yer alan aktif medikal ürünler</p>
                    </div>
                </div>
                <a href="<?= url('/podmin/products') ?>" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 hover:underline flex items-center gap-1">
                    <span>Tümünü Gör</span>
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                <?php foreach ($recentProducts as $prod): ?>
                    <?php $pImg = \App\Models\Product::getImage($prod); ?>
                    <div class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors">
                        <div class="flex items-center gap-3.5 overflow-hidden pr-4">
                            <div class="size-11 rounded-xl bg-white border border-slate-200 p-1 flex items-center justify-center shrink-0 shadow-2xs">
                                <img src="<?= $pImg ?>" alt="<?= e($prod['title_tr']) ?>" class="size-9 object-contain"/>
                            </div>
                            <div class="overflow-hidden">
                                <div class="text-xs font-bold text-slate-900 truncate"><?= e($prod['title_tr']) ?></div>
                                <div class="text-[11px] text-slate-500 truncate flex items-center gap-2 mt-0.5">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 font-medium"><?= e($prod['category_name'] ?? 'Genel') ?></span>
                                    <span class="font-mono text-slate-400 text-[10px]">/<?= e($prod['slug']) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="<?= url('/podmin/products/edit/' . $prod['id']) ?>" class="px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 border border-transparent transition-all">
                                Düzenle
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>
