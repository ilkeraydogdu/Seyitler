<?php
use App\Models\Product;
use App\Models\Category;

/** @var array $products */
/** @var array $categories */
/** @var ?int $activeCategoryId */
/** @var ?string $search */
?>

<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('ÜRÜNLER', 'Ürünlerimiz') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Medikal Ürün Portföyümüz', 'Medikal Ürün Portföyümüz') ?></h1>
    </div>
</section>

<div class="py-12 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Left Sidebar Categories -->
        <aside class="w-full lg:w-64 shrink-0">
            <div class="lg:sticky lg:top-24 space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                    <h3 class="font-bold text-gray-900 text-sm tracking-wider uppercase mb-3 pb-2 border-b border-gray-100">
                        <?= __('Kategoriler', 'Kategoriler') ?>
                    </h3>
                    <div class="flex flex-col gap-1.5">
                        <a href="<?= url('/products') ?>" class="px-3 py-2 text-sm font-medium rounded-lg transition-colors <?= empty($activeCategoryId) ? 'bg-seyitler-primary text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-seyitler-primary' ?>">
                            <?= __('Tüm Ürünler', 'Tüm Ürünler') ?> (<?= count($products) ?>)
                        </a>
                        <?php foreach ($categories as $cat): ?>
                            <?php $isSelected = ($activeCategoryId === (int)$cat['id']); ?>
                            <a href="<?= url('/products?category=' . $cat['id']) ?>" class="px-3 py-2 text-sm font-medium rounded-lg transition-colors flex items-center justify-between <?= $isSelected ? 'bg-seyitler-primary text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-seyitler-primary' ?>">
                                <span><?= e(Category::getName($cat)) ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Right Product Grid -->
        <main class="flex-1">
            <?php if (empty($products)): ?>
                <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-200">
                    <svg class="size-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <h4 class="text-lg font-medium text-gray-700"><?= __('Ürün bulunamadı', 'Bu kategoride henüz ürün bulunmuyor.') ?></h4>
                    <a href="<?= url('/products') ?>" class="inline-block mt-4 px-4 py-2 bg-seyitler-primary text-white text-sm rounded-lg"><?= __('Tüm Ürünlere Dön', 'Tüm Ürünlere Dön') ?></a>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    <?php foreach ($products as $p): ?>
                        <a class="group relative block overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-xl hover:border-seyitler-primary/40 flex flex-col h-full" href="<?= url('/products/' . $p['slug']) ?>">
                            <div class="relative overflow-hidden aspect-square bg-gray-50 flex items-center justify-center p-4">
                                <img alt="<?= e(Product::getTitle($p)) ?>" class="object-contain w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy" src="<?= asset($p['main_image']) ?>"/>
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="mb-1.5 text-base font-semibold text-gray-900 group-hover:text-seyitler-primary transition-colors line-clamp-1">
                                        <?= e(Product::getTitle($p)) ?>
                                    </h4>
                                    <p class="text-xs leading-relaxed text-gray-500 line-clamp-2">
                                        <?= e(Product::getDescription($p)) ?>
                                    </p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs font-semibold text-seyitler-primary">
                                    <span><?= __('Ürünü İncele', 'Ürünü İncele') ?></span>
                                    <svg class="size-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>

    </div>
</div>
