<?php
use App\Models\News;

/** @var array $newsList */
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Etkinlik & Fuar Duyuruları</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Haberler ve Fuar Katılımları</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Anasayfada ve altbilgide listelenen uluslararası medikal fuarları ve kurumsal haberleri yönetin.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-xl bg-purple-50 text-purple-800 text-xs font-extrabold border border-purple-200/60">
                <?= count($newsList) ?> Aktif Haber / Fuar
            </span>
        </div>
    </div>

    <!-- Grid: Left List + Right Creation Panel -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: News List (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden flex flex-col">
            <div class="p-5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="size-8 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/></svg>
                    </div>
                    <span class="font-bold text-xs uppercase tracking-wider text-slate-800">Yayınlanan Haberler</span>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                <?php if (empty($newsList)): ?>
                    <div class="p-12 text-center text-xs text-slate-400 font-medium">Henüz haber veya fuar kaydı eklenmemiş.</div>
                <?php else: ?>
                    <?php foreach ($newsList as $item): ?>
                        <div class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50/80 transition-colors group">
                            <div class="pr-4 overflow-hidden space-y-1">
                                <div class="font-bold text-slate-900 text-sm truncate group-hover:text-emerald-700 transition-colors"><?= e($item['title_tr']) ?></div>
                                <div class="text-xs text-slate-400 truncate flex items-center gap-2">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-500 font-mono text-[10px]">Sıra: <?= (int)$item['sort_order'] ?></span>
                                    <a href="<?= e($item['link_url'] ?: '#') ?>" target="_blank" class="hover:text-emerald-700 truncate font-mono text-[11px] underline flex items-center gap-1 text-slate-500">
                                        <span><?= e($item['link_url'] ?: 'Bağlantı Yok') ?></span>
                                        <svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 shrink-0">
                                <form action="<?= url('/podmin/news/delete/' . $item['id']) ?>" method="POST" onsubmit="return confirm('Bu haberi silmek istediğinize emin misiniz?');" class="inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 rounded-xl hover:bg-rose-50 transition-colors cursor-pointer" title="Sil">
                                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Add News Form (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-7 space-y-5 sticky top-28">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Yeni Haber / Fuar Ekle</h3>
                    <p class="text-[11px] text-slate-400">Etkinlik başlığı ve yönlendirme bağlantısı</p>
                </div>
            </div>
            
            <form action="<?= url('/podmin/news/store') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-blue-50 text-blue-700 text-[10px] font-extrabold border border-blue-200">TR</span>
                        <span>Türkçe Başlık *</span>
                    </label>
                    <input type="text" name="title_tr" required placeholder="Örn: WHX Dubai 2026 Fuarındayız!" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-indigo-50 text-indigo-700 text-[10px] font-extrabold border border-indigo-200">EN</span>
                        <span>İngilizce Başlık</span>
                    </label>
                    <input type="text" name="title_en" placeholder="We are at WHX Dubai 2026!" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="px-1.5 py-0.2 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold border border-emerald-200">AR</span>
                        <span>Arapça Başlık</span>
                    </label>
                    <input type="text" name="title_ar" dir="rtl" placeholder="نحن في معرض دبي 2026!" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Bağlantı URL (Instagram / Haber Linki)</label>
                    <input type="url" name="link_url" placeholder="https://www.instagram.com/p/..." class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Sıralama Önceliği</label>
                    <input type="number" name="sort_order" value="0" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white font-mono text-slate-800"/>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-[1.02] active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>Haberi Kaydet</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
