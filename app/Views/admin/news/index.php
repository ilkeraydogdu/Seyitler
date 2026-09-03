<?php
use App\Models\News;
?>

<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Haberler & Fuarlar</h2>
            <p class="text-xs text-slate-500 mt-0.5">Sitede ve altbilgide gösterilen güncel haberleri ve fuar duyurularını yönetin.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: News List -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-4 bg-slate-50 border-b border-slate-200 font-bold text-xs uppercase tracking-wider text-slate-700">
                Haberler Listesi (<?= count($newsList) ?>)
            </div>
            <div class="divide-y divide-slate-100">
                <?php foreach ($newsList as $item): ?>
                    <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="pr-4 overflow-hidden">
                            <div class="font-bold text-slate-900 text-sm truncate"><?= e($item['title_tr']) ?></div>
                            <div class="text-xs text-slate-400 mt-0.5 truncate flex items-center gap-2">
                                <a href="<?= e($item['link_url']) ?>" target="_blank" class="hover:text-brand-600 truncate underline"><?= e($item['link_url'] ?: '#') ?></a>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <form action="<?= url('/admin/news/delete/' . $item['id']) ?>" method="POST" onsubmit="return confirm('Bu haberi silmek istediğinize emin misiniz?');" class="inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors cursor-pointer" title="Sil">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Right: Add News Form -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Yeni Haber / Fuar Ekle</h3>
            
            <form action="<?= url('/admin/news/store') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (TR) *</label>
                    <input type="text" name="title_tr" required placeholder="Örn: WHX Dubai 2026 Başladı!" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (EN)</label>
                    <input type="text" name="title_en" placeholder="WHX Dubai 2026 Started!" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (AR)</label>
                    <input type="text" name="title_ar" dir="rtl" placeholder="بدأ معرض دبي 2026" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Bağlantı URL (Instagram/Haber Linki)</label>
                    <input type="url" name="link_url" placeholder="https://www.instagram.com/p/..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 font-mono"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Sıralama</label>
                    <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200"/>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-2.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs rounded-xl shadow-md transition-all cursor-pointer">
                        Haberi Kaydet
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
