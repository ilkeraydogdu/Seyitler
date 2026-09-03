<?php
use App\Models\Product;
?>

<!-- Metric Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Products Stat -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Aktif Ürünler</span>
            <div class="text-3xl font-extrabold text-slate-900 mt-1"><?= $productCount ?></div>
            <div class="text-xs text-brand-600 font-semibold mt-1">Yayında ve görüntülenebilir</div>
        </div>
        <div class="size-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
        </div>
    </div>

    <!-- Categories Stat -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kategoriler</span>
            <div class="text-3xl font-extrabold text-slate-900 mt-1"><?= $categoryCount ?></div>
            <div class="text-xs text-blue-600 font-semibold mt-1">Ürün grubu kategorisi</div>
        </div>
        <div class="size-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
        </div>
    </div>

    <!-- Documents Stat -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Yatırımcı Dokümanı</span>
            <div class="text-3xl font-extrabold text-slate-900 mt-1"><?= $documentCount ?></div>
            <div class="text-xs text-amber-600 font-semibold mt-1">İndirilebilir PDF / Rapor</div>
        </div>
        <div class="size-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
    </div>

    <!-- Messages Stat -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Gelen Mesajlar</span>
            <div class="text-3xl font-extrabold text-slate-900 mt-1"><?= $messageCount ?></div>
            <div class="text-xs font-semibold mt-1 <?= $unreadCount > 0 ? 'text-rose-600' : 'text-slate-500' ?>">
                <?= $unreadCount > 0 ? "{$unreadCount} okunmamış mesaj!" : 'Tüm mesajlar okundu' ?>
            </div>
        </div>
        <div class="size-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
        </div>
    </div>

</div>

<!-- Recent Content Tables -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- Recent Messages -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-900 text-sm">Son İletişim Mesajları</h3>
            <a href="<?= url('/admin/messages') ?>" class="text-xs font-semibold text-brand-600 hover:underline">Tümünü Gör</a>
        </div>
        <div class="divide-y divide-slate-100 flex-1">
            <?php if (empty($recentMessages)): ?>
                <div class="p-8 text-center text-xs text-slate-400 font-medium">Henüz mesaj alınmadı.</div>
            <?php else: ?>
                <?php foreach ($recentMessages as $msg): ?>
                    <a href="<?= url('/admin/messages/' . $msg['id']) ?>" class="p-4 flex items-center justify-between hover:bg-slate-50 transition-colors group">
                        <div class="overflow-hidden pr-4">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-slate-900 truncate group-hover:text-brand-600 transition-colors"><?= e($msg['name']) ?></span>
                                <?php if (empty($msg['is_read'])): ?>
                                    <span class="size-2 rounded-full bg-rose-500 shrink-0"></span>
                                <?php endif; ?>
                            </div>
                            <div class="text-xs text-slate-500 truncate mt-0.5"><?= e($msg['subject'] ?: $msg['message']) ?></div>
                        </div>
                        <div class="text-[10px] text-slate-400 font-medium shrink-0">
                            <?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-900 text-sm">Katalogdaki Ürünler</h3>
            <a href="<?= url('/admin/products') ?>" class="text-xs font-semibold text-brand-600 hover:underline">Tümünü Gör</a>
        </div>
        <div class="divide-y divide-slate-100 flex-1">
            <?php foreach ($recentProducts as $prod): ?>
                <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <div class="size-10 rounded-lg bg-slate-100 border border-slate-200 p-1 flex items-center justify-center shrink-0">
                            <img src="<?= asset($prod['main_image']) ?>" alt="" class="object-contain max-h-full max-w-full"/>
                        </div>
                        <div class="truncate">
                            <div class="text-xs font-bold text-slate-900 truncate"><?= e(Product::getTitle($prod)) ?></div>
                            <div class="text-[10px] text-slate-400 font-medium truncate"><?= e($prod['slug']) ?></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="<?= url('/admin/products/edit/' . $prod['id']) ?>" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-lg transition-colors">
                            Düzenle
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
