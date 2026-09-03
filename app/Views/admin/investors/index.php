<?php
use App\Models\InvestorCategory;
use App\Models\InvestorDocument;

/** @var array $documents */
/** @var array $categories */
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Finansal Şeffaflık & SPK / KAP</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Yatırımcı İlişkileri Dokümanları</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Mali tablolar, faaliyet raporları, genel kurul evrakları ve kurumsal PDF bildirimlerini yönetin.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-xl bg-amber-50 text-amber-800 text-xs font-extrabold border border-amber-200/60">
                <?= count($documents) ?> Kayıtlı Doküman
            </span>
        </div>
    </div>

    <!-- Grid: Left List + Right Upload Panel -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Document List (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden flex flex-col">
            <div class="p-5 bg-slate-50/70 border-b border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-2.5">
                    <div class="size-8 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    </div>
                    <span class="font-bold text-xs uppercase tracking-wider text-slate-800">Yatırımcı Dosyaları</span>
                </div>
                <div class="relative w-full sm:w-56">
                    <svg class="size-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input id="admin-doc-filter" type="text" placeholder="Doküman ara..." class="w-full pl-9 pr-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500"/>
                </div>
            </div>

            <div class="divide-y divide-slate-100 max-h-[620px] overflow-y-auto" id="admin-doc-list">
                <?php if (empty($documents)): ?>
                    <div class="p-12 text-center text-xs text-slate-400 font-medium">Henüz doküman yüklenmemiş.</div>
                <?php else: ?>
                    <?php foreach ($documents as $doc): ?>
                        <?php 
                        $cat = InvestorCategory::findById((int)$doc['category_id']); 
                        ?>
                        <div class="p-4 sm:p-4.5 flex items-center justify-between hover:bg-slate-50/80 transition-colors admin-doc-item group">
                            <div class="flex items-center gap-3.5 overflow-hidden pr-3">
                                <div class="size-10 rounded-2xl bg-rose-50 text-rose-600 border border-rose-100 flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm5.5 0h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm-4-4.5h-2.5v7H10V11h1c1.1 0 2-.9 2-2s-.9-2-2-2zm5 0h-2.5v7H15V11h1c1.1 0 2-.9 2-2s-.9-2-2-2z"/></svg>
                                </div>
                                <div class="truncate">
                                    <div class="font-bold text-slate-900 text-xs truncate doc-title group-hover:text-emerald-700 transition-colors"><?= e($doc['label_tr'] ?? $doc['title_tr'] ?? '') ?></div>
                                    <div class="text-[11px] text-slate-400 truncate mt-0.5 flex items-center gap-2">
                                        <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 font-semibold text-[10px]"><?= e($cat ? $cat['name_tr'] : 'Genel') ?></span>
                                        <span class="font-mono text-[10px] text-slate-400 truncate"><?= e($doc['url']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-1.5 shrink-0">
                                <a href="<?= asset($doc['url']) ?>" target="_blank" class="p-2 text-slate-400 hover:text-emerald-700 rounded-xl hover:bg-emerald-50 transition-colors" title="İndir / Görüntüle">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                                </a>
                                <form action="<?= url('/podmin/investors/delete/' . $doc['id']) ?>" method="POST" onsubmit="return confirm('Bu yatırımcı dokümanını kalıcı olarak silmek istediğinize emin misiniz?');" class="inline">
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

        <!-- Right: Add Document Form (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-7 space-y-5 sticky top-28">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Yeni Doküman Yükle</h3>
                    <p class="text-[11px] text-slate-400">PDF, Word veya Excel raporu ekleyin</p>
                </div>
            </div>
            
            <form action="<?= url('/podmin/investors/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Doküman Kategorisi *</label>
                    <select name="category_id" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-semibold text-slate-800">
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= e($c['name_tr']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Doküman Başlığı (TR) *</label>
                    <input type="text" name="title_tr" required placeholder="Örn: 2025 Yılı 4. Çeyrek Finansal Tabloları" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (EN)</label>
                        <input type="text" name="title_en" placeholder="Q4 Financial Report" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (AR)</label>
                        <input type="text" name="title_ar" dir="rtl" placeholder="تقرير مالي" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white"/>
                    </div>
                </div>

                <div class="pt-1">
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Dosya Yükle (.PDF, .XLSX, .DOCX)</label>
                    <input type="file" name="doc_file" accept=".pdf,.doc,.docx,.xls,.xlsx" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 cursor-pointer"/>
                    
                    <div class="mt-2">
                        <span class="text-[10px] text-slate-400">veya dosya yolu / harici bağlantı:</span>
                        <input type="text" name="doc_url" placeholder="assets/documents/..." class="mt-1 w-full px-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 font-mono text-slate-700"/>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-[1.02] active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>Dokümanı Sisteme Kaydet</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterInput = document.getElementById('admin-doc-filter');
    const items = document.querySelectorAll('.admin-doc-item');

    if (filterInput) {
        filterInput.addEventListener('input', (e) => {
            const val = e.target.value.toLowerCase().trim();
            items.forEach(item => {
                const title = item.querySelector('.doc-title').textContent.toLowerCase();
                if (title.includes(val)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    }
});
</script>
