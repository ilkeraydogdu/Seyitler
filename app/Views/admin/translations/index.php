<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Çeviriler & Diller (TR / EN / AR)</h2>
            <p class="text-xs text-slate-500 mt-0.5">Sitedeki tüm statik buton, başlık ve etiket metinlerini dilediğiniz dilde düzenleyin.</p>
        </div>
    </div>

    <!-- Translations List Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <span class="font-bold text-xs uppercase tracking-wider text-slate-700">Tüm Çeviri Anahtarları (<?= count($translations) ?>)</span>
            <input id="trans-filter" type="text" placeholder="Çevirilerde ara..." class="px-3 py-1 text-xs rounded-lg border border-slate-300 w-48"/>
        </div>

        <form action="<?= url('/admin/translations/update') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="overflow-x-auto max-h-[650px] overflow-y-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50 text-slate-600 uppercase font-extrabold tracking-wider border-b border-slate-200 sticky top-0 z-10">
                        <tr>
                            <th class="py-3 px-4 w-1/4">Anahtar (Key)</th>
                            <th class="py-3 px-4 w-1/4">Türkçe (TR)</th>
                            <th class="py-3 px-4 w-1/4">İngilizce (EN)</th>
                            <th class="py-3 px-4 w-1/4">Arapça (AR)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700" id="trans-table-body">
                        <?php foreach ($translations as $t): ?>
                            <tr class="hover:bg-slate-50 transition-colors trans-row">
                                <td class="py-2.5 px-4 font-mono font-bold text-slate-900 trans-key"><?= e($t['trans_key']) ?></td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][value_tr]" value="<?= e($t['value_tr'] ?? '') ?>" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 focus:border-brand-600 outline-none text-xs"/>
                                </td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][value_en]" value="<?= e($t['value_en'] ?? '') ?>" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 focus:border-brand-600 outline-none text-xs"/>
                                </td>
                                <td class="py-2.5 px-4">
                                    <input type="text" name="items[<?= $t['id'] ?>][value_ar]" dir="rtl" value="<?= e($t['value_ar'] ?? '') ?>" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 focus:border-brand-600 outline-none text-xs"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-brand-600/30 transition-all cursor-pointer">
                    Tüm Değişiklikleri Kaydet
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterInput = document.getElementById('trans-filter');
    const rows = document.querySelectorAll('.trans-row');

    if (filterInput) {
        filterInput.addEventListener('input', (e) => {
            const val = e.target.value.toLowerCase().trim();
            rows.forEach(row => {
                const key = row.querySelector('.trans-key').textContent.toLowerCase();
                const inputs = Array.from(row.querySelectorAll('input')).map(i => i.value.toLowerCase()).join(' ');
                if (key.includes(val) || inputs.includes(val)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        });
    }
});
</script>
