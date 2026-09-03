<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTable;
?>

<div class="space-y-6">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Ürün Listesi</h2>
            <p class="text-xs text-slate-500 mt-0.5">Katalogda yer alan medikal ürünleri düzenleyin veya yenilerini ekleyin.</p>
        </div>
        <a href="<?= url('/admin/products/create') ?>" class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-brand-600/30 transition-all cursor-pointer shrink-0">
            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            <span>Yeni Ürün Ekle</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50 text-slate-600 uppercase font-extrabold tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4 w-16 text-center">Görsel</th>
                        <th class="py-3.5 px-4">Ürün Adı (TR)</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4 text-center">Varyantlar</th>
                        <th class="py-3.5 px-4 text-center">Sıra</th>
                        <th class="py-3.5 px-4 text-center">Durum</th>
                        <th class="py-3.5 px-4 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php foreach ($products as $p): ?>
                        <?php 
                        $cat = Category::findById((int)$p['category_id']); 
                        $variantCount = count(ProductTable::getByProductId((int)$p['id']));
                        ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-4 text-center">
                                <div class="size-12 rounded-xl bg-slate-100 border border-slate-200 p-1 mx-auto flex items-center justify-center">
                                    <img src="<?= asset($p['main_image']) ?>" alt="" class="max-h-full max-w-full object-contain"/>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-bold text-slate-900 text-sm"><?= e(Product::getTitle($p)) ?></div>
                                <div class="text-[10px] text-slate-400 font-mono"><?= e($p['slug']) ?></div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-semibold rounded-lg text-[11px]">
                                    <?= e($cat ? Category::getName($cat) : 'Kategorisiz') ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-slate-900">
                                <span class="inline-flex items-center gap-1 text-xs">
                                    <span class="size-2 rounded-full bg-emerald-500"></span>
                                    <?= $variantCount ?> ölçü
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center font-mono font-bold text-slate-500">
                                <?= (int)$p['sort_order'] ?>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <?php if (!empty($p['is_active'])): ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Yayında</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">Taslak</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= url('/products/' . $p['slug']) ?>" target="_blank" class="p-2 text-slate-400 hover:text-brand-600 rounded-lg hover:bg-slate-100 transition-colors" title="Sitede İncele">
                                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                    </a>
                                    <a href="<?= url('/admin/products/edit/' . $p['id']) ?>" class="p-2 text-slate-600 hover:text-brand-600 rounded-lg hover:bg-slate-100 transition-colors" title="Düzenle">
                                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                                    </a>
                                    <form action="<?= url('/admin/products/delete/' . $p['id']) ?>" method="POST" onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?');" class="inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors cursor-pointer" title="Sil">
                                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
