<?php
/** @var array $translations */
/** @var string|null $searchQuery */
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Çok Dilli Sözlük & Metinler</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Çeviriler & Diller (TR / EN / AR)</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Sitedeki tüm butonlar, başlıklar, sayaçlar ve menü metinlerini veritabanı üzerinden dilediğiniz dilde anında düzenleyin.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-extrabold border border-emerald-200/60">
                <?= count($translations) ?> Çeviri Kaydı
            </span>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-subtle p-4">
        <form method="GET" action="<?= url('/podmin/translations') ?>" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-1 w-full">
                <svg class="size-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                <input type="text" name="q" value="<?= e($searchQuery ?? '') ?>" placeholder="Anahtar kelime veya metin ara (Türkçe, İngilizce, Arapça)..." class="w-full pl-10 pr-4 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all text-slate-800"/>
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-slate-900 hover:bg-black text-white text-xs font-bold rounded-xl transition-all shadow-xs cursor-pointer">
                Ara
            </button>
            <?php if (!empty($searchQuery)): ?>
                <a href="<?= url('/podmin/translations') ?>" class="w-full sm:w-auto px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl text-center transition-colors">
                    Filtreyi Temizle
                </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Translations Form & Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <form action="<?= url('/podmin/translations/update') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="overflow-x-auto max-h-[700px] overflow-y-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50/80 text-slate-500 uppercase font-extrabold tracking-wider border-b border-slate-200/80 sticky top-0 z-10">
                        <tr>
                            <th class="py-3.5 px-4 w-1/4">Sözlük Anahtarı (Key)</th>
                            <th class="py-3.5 px-4 w-1/4">🇹🇷 Türkçe (TR)</th>
                            <th class="py-3.5 px-4 w-1/4">🇬🇧 English (EN)</th>
                            <th class="py-3.5 px-4 w-1/4">🇸🇦 العربية (AR)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        <?php foreach ($translations as $t): ?>
                            <tr class="hover:bg-slate-50/70 transition-colors group">
                                <td class="py-3.5 px-4 font-mono font-bold text-slate-900 break-all text-[11px]">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 border border-slate-200/60"><?= e($t['phrase_key']) ?></span>
                                </td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][tr_text]" value="<?= e($t['tr_text'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800 font-semibold"/>
                                </td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][en_text]" value="<?= e($t['en_text'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none text-slate-800 font-semibold"/>
                                </td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][ar_text]" dir="rtl" value="<?= e($t['ar_text'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800 font-semibold"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Sticky Bottom Save Bar -->
            <div class="p-4 bg-white/90 backdrop-blur-md border-t border-slate-200/80 flex items-center justify-between sticky bottom-0 z-20">
                <span class="text-xs text-slate-400 hidden sm:inline">Metin değişiklikleri sitenin tüm dillerinde anında güncellenir.</span>
                <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    <span>Tüm Çevirileri Kaydet</span>
                </button>
            </div>
        </form>
    </div>
</div>
