<div>
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase"><?= __('menu_products', 'Ürünlerimiz') ?></span>
                <span class="text-seyitler-txt/50">
                    <svg class="lucide lucide-arrow-left-icon size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </span>
                <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('menu_home', 'Anasayfa') ?></a>
            </nav>
        </div>
    </section>

    <div class="py-8 mx-auto max-w-7xl sm:py-12 md:py-16">
        <div class="px-5 mb-8 xl:px-0 sm:mb-12">
            <p class="w-full text-base leading-7 text-seyitler-txt sm:text-lg sm:leading-9">
                <?= __('products_intro', 'Seyitler Kimya olarak, insan sağlığını merkeze alan anlayışımızla geliştirdiğimiz tüm ürünlerde; yüksek kalite, güvenilirlik ve yenilik ilkelerini esas alıyoruz. Üretim süreçlerimizde uluslararası standartlara bağlı kalarak, her biri titizlikle test edilmiş medikal ürünler sunuyoruz. Plasterlerden yara örtülerine, ilk yardım bantlarından özel tedavi çözümlerine kadar uzanan geniş ürün yelpazemizle sağlık profesyonellerine ve iş ortaklarımıza güven veren çözümler üretiyoruz.') ?>
            </p>
        </div>

        <div class="flex flex-col gap-8 px-5 lg:flex-row xl:px-0">
            <!-- Sidebar: Categories -->
            <aside class="w-full lg:w-64 lg:flex-shrink-0">
                <div class="lg:sticky lg:top-24">
                    <h3 class="relative pb-2 mb-4 text-lg font-semibold text-gray-900 after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-seyitler-primary">
                        <?= __('product_categories', 'Ürün Kategorilerimiz') ?>
                    </h3>
                    <div class="flex flex-wrap sm:flex-col sm:flex-1 gap-2" id="catalog-category-filters">
                        <a href="<?= url('/products') ?>" class="px-4 py-2 text-sm font-medium border transition-all duration-200 <?= empty($activeCategoryId) ? 'bg-seyitler-primary text-white border-seyitler-primary' : 'bg-white text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary' ?> text-left block">
                            <?= __('all_products', 'Tüm Ürünler') ?>
                        </a>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <a href="<?= url('/products?category=' . $cat['id']) ?>" class="px-4 py-2 text-sm font-medium border transition-all duration-200 <?= (!empty($activeCategoryId) && (int)$activeCategoryId === (int)$cat['id']) ? 'bg-seyitler-primary text-white border-seyitler-primary' : 'bg-white text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary' ?> text-left block">
                                    <?= e(\App\Models\Category::getName($cat)) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>

            <!-- Main Product Grid -->
            <main class="flex-1">
                <?php if (empty($products)): ?>
                    <div class="text-center py-16 bg-gray-50 rounded-xl border border-gray-200">
                        <svg class="mx-auto size-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-600 font-medium"><?= __('no_products_found', 'Bu kategoride henüz ürün bulunmuyor.') ?></p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        <?php foreach ($products as $prod): ?>
                            <?php 
                                $pTitle = \App\Models\Product::getTitle($prod);
                                $pDesc = \App\Models\Product::getDescription($prod);
                                $pFeatures = \App\Models\Product::getFeatures($prod);
                                $pImg = \App\Models\Product::getImage($prod);
                                $pUrl = url('/products/' . $prod['slug']);
                            ?>
                            <a class="group relative block overflow-hidden transition-all duration-300 bg-white border border-gray-200 hover:shadow-lg hover:border-seyitler-primary/30 h-full flex flex-col" href="<?= $pUrl ?>">
                                <div class="relative overflow-hidden aspect-square">
                                    <img alt="<?= e($pTitle) ?>" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy" src="<?= $pImg ?>"/>
                                </div>
                                <div class="p-4 flex-1 flex flex-col justify-end">
                                    <div class="mt-auto">
                                        <h4 class="mb-2 text-base font-semibold text-gray-900 transition-colors group-hover:text-seyitler-primary line-clamp-2"><?= e($pTitle) ?></h4>
                                        <p class="text-sm leading-relaxed text-gray-600 line-clamp-2"><?= e($pDesc) ?></p>
                                    </div>
                                </div>
                                <div class="pointer-events-none absolute inset-0 z-10 translate-y-full group-hover:translate-y-0 focus-within:translate-y-0 transition-transform duration-300 ease-out bg-seyitler-primary text-white">
                                    <div class="p-4 space-y-2">
                                        <h4 class="text-base font-semibold"><?= e($pTitle) ?></h4>
                                        <p class="text-sm/6 opacity-90"><?= e($pDesc) ?></p>
                                        <?php if (!empty($pFeatures)): ?>
                                            <ul class="list-disc pl-5 space-y-1 text-sm/6 opacity-90">
                                                <?php foreach ($pFeatures as $feat): ?>
                                                    <li><?= e($feat) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Google & User Friendly Pagination Navigation -->
                    <?php if (!empty($pagination) && $pagination['totalPages'] > 1): ?>
                        <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="text-xs text-gray-500 font-medium">
                                <?= __('Toplam', 'Toplam') ?> <strong class="text-gray-900 font-bold"><?= $pagination['total'] ?></strong> <?= __('üründen', 'üründen') ?> 
                                <strong class="text-gray-900 font-bold"><?= (($pagination['page'] - 1) * $pagination['perPage']) + 1 ?> - <?= min($pagination['total'], $pagination['page'] * $pagination['perPage']) ?></strong> 
                                <?= __('arası listeleniyor', 'arası listeleniyor') ?>
                            </div>

                            <nav aria-label="<?= __('Sayfalama', 'Sayfalama') ?>" class="inline-flex items-center gap-1.5">
                                <?php
                                $buildPageUrl = function(int $pNum) use ($queryParams): string {
                                    $p = $queryParams;
                                    if ($pNum > 1) {
                                        $p['page'] = $pNum;
                                    } else {
                                        unset($p['page']);
                                    }
                                    return url('/products') . (!empty($p) ? '?' . http_build_query($p) : '');
                                };
                                ?>

                                <!-- Previous Button -->
                                <?php if ($pagination['page'] > 1): ?>
                                    <a href="<?= $buildPageUrl($pagination['page'] - 1) ?>" rel="prev" class="px-3 py-2 text-xs font-semibold rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 hover:border-seyitler-primary hover:text-seyitler-primary transition-all flex items-center gap-1" aria-label="<?= __('Önceki Sayfa', 'Önceki Sayfa') ?>">
                                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
                                        <span class="hidden sm:inline"><?= __('Önceki', 'Önceki') ?></span>
                                    </a>
                                <?php endif; ?>

                                <!-- Page Number Links -->
                                <?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
                                    <?php if ($i === 1 || $i === $pagination['totalPages'] || ($i >= $pagination['page'] - 2 && $i <= $pagination['page'] + 2)): ?>
                                        <a href="<?= $buildPageUrl($i) ?>" class="size-9 text-xs font-bold rounded-lg border transition-all flex items-center justify-center <?= $i === $pagination['page'] ? 'bg-seyitler-primary text-white border-seyitler-primary shadow-xs' : 'bg-white text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary' ?>" <?= $i === $pagination['page'] ? 'aria-current="page"' : '' ?>>
                                            <?= $i ?>
                                        </a>
                                    <?php elseif ($i === 2 || $i === $pagination['totalPages'] - 1): ?>
                                        <span class="px-1 text-gray-400 text-xs">...</span>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <!-- Next Button -->
                                <?php if ($pagination['page'] < $pagination['totalPages']): ?>
                                    <a href="<?= $buildPageUrl($pagination['page'] + 1) ?>" rel="next" class="px-3 py-2 text-xs font-semibold rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 hover:border-seyitler-primary hover:text-seyitler-primary transition-all flex items-center gap-1" aria-label="<?= __('Sonraki Sayfa', 'Sonraki Sayfa') ?>">
                                        <span class="hidden sm:inline"><?= __('Sonraki', 'Sonraki') ?></span>
                                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                                    </a>
                                <?php endif; ?>
                            </nav>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>