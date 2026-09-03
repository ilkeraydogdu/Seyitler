<?php
/** @var array $pages */

function getPagePublicUrl(string $slug): string {
    if ($slug === 'home') {
        return url('/');
    }
    if (in_array($slug, ['history', 'mission-vision', 'values', 'organization', 'sustainability', 'human-resources'], true)) {
        return url('/about-us/' . $slug);
    }
    if ($slug === 'cookie-policy') {
        return url('/cerez-politikasi');
    }
    return url('/' . $slug);
}
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Navigasyon Menüsü Sıralı Sayfa Yönetimi</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Tüm Site Sayfaları</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Anasayfa, Kurumsal, Ürünler, Yatırımcı İlişkileri, Ar-Ge, Faaliyet Alanları, İletişim ve Yasal sayfaları menü sırasıyla yönetin.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-extrabold border border-emerald-200/60 shadow-2xs">
                <?= count($pages) ?> Dinamik Sayfa (Menü Sıralı)
            </span>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50/80 text-slate-500 uppercase font-extrabold tracking-wider border-b border-slate-200/80">
                    <tr>
                        <th class="py-4 px-4 text-center w-12">#</th>
                        <th class="py-4 px-6">Sayfa Başlığı</th>
                        <th class="py-4 px-6">Menü / URL</th>
                        <th class="py-4 px-6 text-center">Diller</th>
                        <th class="py-4 px-6 text-center">Durum</th>
                        <th class="py-4 px-6 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php foreach ($pages as $idx => $p): ?>
                        <?php 
                        $publicUrl = getPagePublicUrl($p['slug']);
                        $isSubPage = in_array($p['slug'], ['history', 'mission-vision', 'values', 'organization', 'sustainability', 'human-resources'], true);
                        ?>
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="py-4 px-4 text-center font-mono font-bold text-slate-400">
                                <?= $p['sort_order'] ?: ($idx + 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3.5 <?= $isSubPage ? 'pl-4' : '' ?>">
                                    <div class="size-10 rounded-2xl <?= $isSubPage ? 'bg-slate-100 text-slate-600' : 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' ?> flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                                        <?php if ($p['slug'] === 'home'): ?>
                                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                                        <?php elseif ($isSubPage): ?>
                                            <span class="text-xs font-bold font-mono">↳</span>
                                        <?php else: ?>
                                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm group-hover:text-emerald-700 transition-colors flex items-center gap-2">
                                            <span><?= e($p['title_tr']) ?></span>
                                            <?php if ($isSubPage): ?>
                                                <span class="text-[10px] font-normal px-1.5 py-0.5 rounded bg-slate-100 text-slate-500">Kurumsal Altı</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-[11px] text-slate-400 truncate max-w-xs mt-0.5"><?= e($p['subtitle_tr'] ?: 'Alt başlık varsayılan') ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-mono text-xs text-slate-500">
                                <span class="px-2 py-1 rounded-lg bg-slate-100 text-slate-700">
                                    <?= $p['slug'] === 'home' ? '/' : '/' . e($p['slug']) ?>
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="inline-flex items-center gap-1.5">
                                    <span class="px-2 py-0.5 text-[10px] font-extrabold rounded-md bg-blue-50 text-blue-700 border border-blue-200">TR</span>
                                    <span class="px-2 py-0.5 text-[10px] font-extrabold rounded-md <?= !empty($p['title_en']) ? 'bg-indigo-50 text-indigo-700 border border-indigo-200' : 'bg-slate-100 text-slate-400' ?>">EN</span>
                                    <span class="px-2 py-0.5 text-[10px] font-extrabold rounded-md <?= !empty($p['title_ar']) ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-400' ?>">AR</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php if ($p['is_active']): ?>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200/80 shadow-2xs">Yayında</span>
                                <?php else: ?>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200">Pasif</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= $publicUrl ?>" target="_blank" class="p-2 text-slate-400 hover:text-emerald-700 rounded-xl hover:bg-emerald-50 transition-colors" title="Sayfayı Sitede Görüntüle">
                                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                    </a>
                                    <a href="<?= url('/podmin/pages/' . $p['id'] . '/edit') ?>" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 border border-transparent rounded-xl transition-all">
                                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                                        <span>Düzenle</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
