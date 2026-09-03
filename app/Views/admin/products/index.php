<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTable;

/** @var array $products */
?>

<div class="space-y-6">
    
    <!-- Top Action & Title Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Medikal Ürün Portföyü</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Katalog ve Ürün Yönetimi</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Sitede sergilenen tüm tıbbi plaster, yara bakım ve cerrahi ürünleri yönetin.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="<?= url('/podmin/products/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Yeni Ürün Ekle</span>
            </a>
        </div>
    </div>

    <!-- Live Filter Bar (Instant Search & Category Selector) -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-subtle p-4 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="relative w-full md:w-96">
            <svg class="size-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
            <input type="text" id="product-search-input" placeholder="Ürün adı, kod veya slug ara..." class="w-full pl-10 pr-4 py-2 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all text-slate-800"/>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto justify-end">
            <span class="text-xs font-bold text-slate-400 hidden sm:inline">Toplam:</span>
            <span class="px-3 py-1 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-extrabold border border-emerald-200/60" id="product-count-badge">
                <?= count($products) ?> Ürün Kayıtlı
            </span>
        </div>
    </div>

    <!-- Products Data Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50/80 text-slate-500 uppercase font-extrabold tracking-wider border-b border-slate-200/80">
                    <tr>
                        <th class="py-4 px-4 w-16 text-center">Görsel</th>
                        <th class="py-4 px-4">Ürün Bilgisi</th>
                        <th class="py-4 px-4">Kategori</th>
                        <th class="py-4 px-4 text-center">Varyant Ölçüleri</th>
                        <th class="py-4 px-4 text-center">Sıra</th>
                        <th class="py-4 px-4 text-center">Yayın Durumu</th>
                        <th class="py-4 px-4 text-right">Aksiyonlar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700" id="product-table-body">
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="7" class="py-16 text-center">
                                <div class="size-14 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                                    <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                                </div>
                                <h4 class="font-bold text-slate-800 text-sm">Katalogda Henüz Ürün Yok</h4>
                                <p class="text-xs text-slate-400 mt-1">Hemen yukarıdaki "Yeni Ürün Ekle" butonunu kullanarak ilk ürününüzü ekleyin.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $p): ?>
                            <?php 
                            $cat = Category::findById((int)$p['category_id']); 
                            $variantCount = count(ProductTable::getByProductId((int)$p['id']));
                            $title = Product::getTitle($p);
                            $img = Product::getImage($p);
                            ?>
                            <tr class="product-row hover:bg-slate-50/80 transition-colors" data-search="<?= strtolower(e($title . ' ' . $p['slug'] . ' ' . ($cat ? Category::getName($cat) : ''))) ?>">
                                
                                <!-- Thumbnail Image -->
                                <td class="py-3 px-4 text-center">
                                    <div class="size-12 rounded-xl bg-white border border-slate-200/80 p-1 mx-auto flex items-center justify-center shadow-2xs group relative overflow-hidden">
                                        <img src="<?= $img ?>" alt="<?= e($title) ?>" class="max-h-full max-w-full object-contain transition-transform group-hover:scale-110"/>
                                    </div>
                                </td>

                                <!-- Title & Slug -->
                                <td class="py-3 px-4">
                                    <div class="font-bold text-slate-900 text-sm leading-snug"><?= e($title) ?></div>
                                    <div class="text-[11px] text-slate-400 font-mono mt-0.5 flex items-center gap-1">
                                        <span>/products/</span>
                                        <span class="text-slate-600 font-semibold"><?= e($p['slug']) ?></span>
                                    </div>
                                </td>

                                <!-- Category Badge -->
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold rounded-lg text-[11px] border border-slate-200/60 inline-flex items-center gap-1.5">
                                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                        <?= e($cat ? Category::getName($cat) : 'Kategorisiz') ?>
                                    </span>
                                </td>

                                <!-- Variants Count Badge -->
                                <td class="py-3 px-4 text-center">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold <?= $variantCount > 0 ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-slate-100 text-slate-500' ?>">
                                        <span class="size-1.5 rounded-full <?= $variantCount > 0 ? 'bg-emerald-500' : 'bg-slate-400' ?>"></span>
                                        <span><?= $variantCount ?> ölçü</span>
                                    </span>
                                </td>

                                <!-- Sort Order -->
                                <td class="py-3 px-4 text-center font-mono font-bold text-slate-500">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-[11px]"><?= (int)$p['sort_order'] ?></span>
                                </td>

                                <!-- Status Badge -->
                                <td class="py-3 px-4 text-center">
                                    <?php if (!empty($p['is_active'])): ?>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200/80 shadow-2xs">Yayında</span>
                                    <?php else: ?>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200">Taslak</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Action Buttons -->
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <!-- Live Preview Link -->
                                        <a href="<?= url('/products/' . $p['slug']) ?>" target="_blank" class="p-2 text-slate-400 hover:text-emerald-600 rounded-xl hover:bg-emerald-50 transition-colors" title="Canlı Sitede İncele">
                                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="<?= url('/podmin/products/edit/' . $p['id']) ?>" class="p-2 text-slate-600 hover:text-emerald-700 rounded-xl hover:bg-emerald-50 transition-colors font-semibold" title="Düzenle">
                                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="<?= url('/podmin/products/delete/' . $p['id']) ?>" method="POST" onsubmit="return confirm('Bu ürünü ve ilişkili varyant tablolarını silmek istediğinize emin misiniz?');" class="inline">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 rounded-xl hover:bg-rose-50 transition-colors cursor-pointer" title="Sil">
                                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('product-search-input');
    const rows = document.querySelectorAll('.product-row');
    const countBadge = document.getElementById('product-count-badge');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach(row => {
                const text = row.getAttribute('data-search') || '';
                if (text.includes(query)) {
                    row.classList.remove('hidden');
                    visibleCount++;
                } else {
                    row.classList.add('hidden');
                }
            });

            if (countBadge) {
                countBadge.textContent = visibleCount + ' Ürün Listeleniyor';
            }
        });
    }
});
</script>
