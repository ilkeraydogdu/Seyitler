<?php
use App\Models\InvestorCategory;
use App\Models\InvestorDocument;
?>

<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Yatırımcı İlişkileri Doküman Yönetimi</h2>
            <p class="text-xs text-slate-500 mt-0.5">Finansal tablolar, faaliyet raporları ve genel kurul dokümanlarını yönetin.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Documents List -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
            <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                <span class="font-bold text-xs uppercase tracking-wider text-slate-700">Tüm Dokümanlar (<?= count($documents) ?>)</span>
                
                <input id="admin-doc-filter" type="text" placeholder="Doküman ara..." class="px-3 py-1 text-xs rounded-lg border border-slate-300 w-48"/>
            </div>

            <div class="divide-y divide-slate-100 max-h-[600px] overflow-y-auto" id="admin-doc-list">
                <?php foreach ($documents as $doc): ?>
                    <?php 
                    $cat = InvestorCategory::findById((int)$doc['category_id']); 
                    ?>
                    <div class="p-3.5 flex items-center justify-between hover:bg-slate-50 transition-colors admin-doc-item">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <div class="size-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm5.5 0h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm-4-4.5h-2.5v7H10V11h1c1.1 0 2-.9 2-2s-.9-2-2-2zm5 0h-2.5v7H15V11h1c1.1 0 2-.9 2-2s-.9-2-2-2z"/></svg>
                            </div>
                            <div class="truncate">
                                <div class="font-bold text-slate-900 text-xs truncate doc-title"><?= e($doc['title_tr']) ?></div>
                                <div class="text-[10px] text-slate-400 truncate mt-0.5">
                                    <?= e($cat ? $cat['name_tr'] : 'Kategori Yok') ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <a href="<?= asset($doc['url']) ?>" target="_blank" class="p-1.5 text-slate-400 hover:text-brand-600" title="İndir / Görüntüle">
                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                            </a>
                            <form action="<?= url('/admin/investors/delete/' . $doc['id']) ?>" method="POST" onsubmit="return confirm('Bu dokümanı silmek istediğinize emin misiniz?');" class="inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 cursor-pointer" title="Sil">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Right: Add New Document Form -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Yeni Doküman Yükle</h3>
            
            <form action="<?= url('/admin/investors/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kategori *</label>
                    <select name="category_id" required class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none">
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= e($c['name_tr']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Doküman Başlığı (TR) *</label>
                    <input type="text" name="title_tr" required placeholder="Örn: 2025 Yılı 4. Çeyrek Finansal Rapor" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"/>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (EN)</label>
                        <input type="text" name="title_en" placeholder="Q4 Financial Report" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Başlık (AR)</label>
                        <input type="text" name="title_ar" dir="rtl" placeholder="تقرير مالي" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200"/>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">PDF Dosyası Seç</label>
                    <input type="file" name="doc_file" accept=".pdf,.doc,.docx,.xls,.xlsx" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200"/>
                    <div class="text-[10px] text-slate-400 mt-1">veya doğrudan dosya yolu / URL:</div>
                    <input type="text" name="doc_url" placeholder="assets/documents/..." class="mt-1 w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 font-mono"/>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-2.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs rounded-xl shadow-md transition-all cursor-pointer">
                        Dokümanı Kaydet
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
