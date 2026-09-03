<?php
$mainImgSrc = \App\Models\Product::getImage($product);
if (empty($gallery) && !empty($product['main_image'])) {
    $gallery = [$product['main_image']];
}
?>
<div>
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase"><?= e(\App\Models\Product::getTitle($product)) ?></span>
                <span class="text-seyitler-txt/50">
                    <svg class="lucide lucide-arrow-left-icon size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </span>
                <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/products') ?>"><?= __('menu_products', 'Ürünlerimiz') ?></a>
            </nav>
        </div>
    </section>

    <div class="py-8 mx-auto max-w-7xl sm:py-12 md:py-16">
        <div class="flex flex-col gap-8 px-5 lg:flex-row xl:px-0">
            <!-- Sidebar: Categories & Related Products -->
            <aside class="w-full lg:w-64 lg:flex-shrink-0">
                <div class="space-y-8 lg:sticky lg:top-24">
                    <div>
                        <h3 class="relative pb-2 mb-4 text-lg font-semibold text-gray-900 after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-seyitler-primary">
                            <?= __('product_categories', 'Ürün Kategorilerimiz') ?>
                        </h3>
                        <div class="flex flex-wrap sm:flex-col sm:flex-1 gap-2">
                            <a href="<?= url('/products') ?>" class="px-4 py-2 text-sm font-medium transition-all duration-200 bg-white border border-gray-300 text-gray-700 hover:border-seyitler-primary hover:text-seyitler-primary block">
                                <?= __('all_products', 'Tüm Ürünler') ?>
                            </a>
                            <?php foreach ($categories as $c): ?>
                                <?php $isAct = (!empty($product['category_id']) && (int)$product['category_id'] === (int)$c['id']); ?>
                                <a href="<?= url('/products?category=' . $c['id']) ?>" class="px-4 py-2 text-sm font-medium transition-all duration-200 border <?= $isAct ? 'bg-seyitler-primary text-white border-seyitler-primary' : 'bg-white text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary' ?> block">
                                    <?= e(\App\Models\Category::getName($c)) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if (!empty($related)): ?>
                        <div>
                            <h3 class="relative pb-2 mb-4 text-lg font-semibold text-gray-900 after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-seyitler-primary">
                                <?= __('related_products', 'İlgili Ürünler') ?>
                            </h3>
                            <div class="space-y-3">
                                <?php foreach ($related as $rel): ?>
                                    <a class="flex items-center gap-3 p-2 transition-colors rounded-lg group hover:bg-gray-50 border border-transparent hover:border-gray-100" href="<?= url('/products/' . $rel['slug']) ?>">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded border border-gray-100 bg-white flex items-center justify-center">
                                            <img alt="<?= e(\App\Models\Product::getTitle($rel)) ?>" class="object-contain w-full h-full p-1" src="<?= \App\Models\Product::getImage($rel) ?>"/>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700 transition-colors group-hover:text-seyitler-primary line-clamp-2">
                                            <?= e(\App\Models\Product::getTitle($rel)) ?>
                                        </span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>

            <!-- Main Product Details -->
            <main class="flex-1">
                <div class="flex flex-col gap-8 lg:grid lg:grid-cols-2">
                    <!-- Left Column: Gallery -->
                    <div class="w-full lg:col-span-1">
                        <div class="relative group/main-img overflow-hidden border border-gray-200 aspect-square rounded-xl bg-white shadow-sm flex items-center justify-center">
                            <img alt="<?= e(\App\Models\Product::getTitle($product)) ?>" class="object-contain w-full h-full p-2 transition-opacity duration-200" id="main-product-img" src="<?= $mainImgSrc ?>"/>
                            <?php if (!empty($gallery) && count($gallery) > 1): ?>
                                <button aria-label="Önceki Görsel" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:bg-white hover:scale-105 transition-all opacity-0 group-hover/main-img:opacity-100 cursor-pointer z-10" id="main-img-prev-btn" type="button">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                                </button>
                                <button aria-label="Sonraki Görsel" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:bg-white hover:scale-105 transition-all opacity-0 group-hover/main-img:opacity-100 cursor-pointer z-10" id="main-img-next-btn" type="button">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($gallery) && count($gallery) > 1): ?>
                            <div class="relative mt-4 group/slider px-6">
                                <button aria-label="Önceki" class="absolute left-0 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:scale-110 hover:shadow-lg transition-all cursor-pointer" id="thumb-prev-btn" type="button">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                                </button>
                                <div class="flex gap-2 overflow-x-auto scroll-smooth scrollbar-hide py-1 cursor-grab" id="product-thumbnails-list">
                                    <?php foreach ($gallery as $tIdx => $tImg): ?>
                                        <button class="product-thumb-btn flex-shrink-0 w-20 h-20 overflow-hidden bg-gray-50 border-2 transition-all duration-200 rounded-lg cursor-pointer <?= $tIdx === 0 ? 'border-seyitler-primary hover:border-seyitler-primary/60 scale-105 shadow-sm' : 'border-gray-200 hover:border-seyitler-primary/60' ?>" data-img-src="<?= asset($tImg) ?>" data-index="<?= $tIdx ?>" type="button">
                                            <img alt="<?= e(\App\Models\Product::getTitle($product)) ?> - <?= $tIdx + 1 ?>" class="object-contain w-full h-full p-1 pointer-events-none" src="<?= asset($tImg) ?>"/>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                                <button aria-label="Sonraki" class="absolute right-0 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:scale-110 hover:shadow-lg transition-all cursor-pointer" id="thumb-next-btn" type="button">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right Column: Info & Tabs -->
                    <div class="w-full lg:col-span-1">
                        <h1 class="mb-4 text-2xl font-bold text-gray-900 uppercase sm:text-3xl"><?= e(\App\Models\Product::getTitle($product)) ?></h1>
                        <p class="mb-6 leading-relaxed text-gray-600"><?= e(\App\Models\Product::getDescription($product)) ?></p>

                        <div class="border-t border-gray-200">
                            <div class="flex border-b border-gray-200" id="product-tabs-nav">
                                <button class="px-6 py-3 text-sm font-semibold transition-colors relative text-seyitler-primary after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0.5 after:bg-seyitler-primary cursor-pointer" id="tab-btn-features">
                                    <?= __('features', 'Özellikler') ?>
                                </button>
                                <?php if (!empty($specs)): ?>
                                    <button class="px-6 py-3 text-sm font-semibold transition-colors relative text-gray-500 hover:text-gray-700 cursor-pointer" id="tab-btn-table">
                                        <?= __('spec_table', 'Tablo') ?>
                                    </button>
                                <?php endif; ?>
                            </div>

                            <div class="py-6">
                                <div class="product-tab-pane" id="tab-features-content">
                                    <p class="mb-4 leading-relaxed text-gray-600"><?= e(\App\Models\Product::getDescription($product)) ?></p>
                                    <?php if (!empty($features)): ?>
                                        <ul class="space-y-2">
                                            <?php foreach ($features as $f): ?>
                                                <li class="flex items-start gap-2 text-gray-600">
                                                    <svg class="lucide lucide-check-icon flex-shrink-0 w-5 h-5 mt-0.5 text-seyitler-primary" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 6 9 17l-5-5"></path>
                                                    </svg>
                                                    <span><?= e($f) ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($specs)): ?>
                                    <div class="product-tab-pane hidden" id="tab-table-content">
                                        <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                                            <table class="w-full text-left text-sm border-collapse">
                                                <thead class="bg-gray-50 text-gray-700 font-semibold text-xs border-b border-gray-200 uppercase tracking-wider">
                                                    <tr>
                                                        <th class="px-4 py-3"><?= __('measure', 'Ölçü') ?></th>
                                                        <th class="px-4 py-3"><?= __('width', 'En') ?></th>
                                                        <th class="px-4 py-3"><?= __('length', 'Boy') ?></th>
                                                        <th class="px-4 py-3"><?= __('height', 'Yükseklik') ?></th>
                                                        <th class="px-4 py-3"><?= __('box_qty', 'Kutu İçi Adet') ?></th>
                                                        <th class="px-4 py-3"><?= __('case_qty', 'Koli İçi Adet') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 text-gray-600 bg-white">
                                                    <?php foreach ($specs as $s): ?>
                                                        <tr class="hover:bg-gray-50/80 transition-colors">
                                                            <td class="px-4 py-3 font-medium text-gray-900"><?= e($s['size']) ?></td>
                                                            <td class="px-4 py-3"><?= e($s['width']) ?></td>
                                                            <td class="px-4 py-3"><?= e($s['length']) ?></td>
                                                            <td class="px-4 py-3"><?= e($s['height']) ?></td>
                                                            <td class="px-4 py-3"><?= e($s['box_qty']) ?></td>
                                                            <td class="px-4 py-3"><?= e($s['case_qty']) ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Tabs toggle
    var tabBtnFeatures = document.getElementById("tab-btn-features");
    var tabBtnTable = document.getElementById("tab-btn-table");
    var tabFeaturesContent = document.getElementById("tab-features-content");
    var tabTableContent = document.getElementById("tab-table-content");

    if (tabBtnFeatures && tabBtnTable) {
        tabBtnFeatures.addEventListener("click", function() {
            tabBtnFeatures.className = "px-6 py-3 text-sm font-semibold transition-colors relative text-seyitler-primary after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0.5 after:bg-seyitler-primary cursor-pointer";
            tabBtnTable.className = "px-6 py-3 text-sm font-semibold transition-colors relative text-gray-500 hover:text-gray-700 cursor-pointer";
            if (tabFeaturesContent) tabFeaturesContent.classList.remove("hidden");
            if (tabTableContent) tabTableContent.classList.add("hidden");
        });

        tabBtnTable.addEventListener("click", function() {
            tabBtnTable.className = "px-6 py-3 text-sm font-semibold transition-colors relative text-seyitler-primary after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0.5 after:bg-seyitler-primary cursor-pointer";
            tabBtnFeatures.className = "px-6 py-3 text-sm font-semibold transition-colors relative text-gray-500 hover:text-gray-700 cursor-pointer";
            if (tabTableContent) tabTableContent.classList.remove("hidden");
            if (tabFeaturesContent) tabFeaturesContent.classList.add("hidden");
        });
    }

    // Gallery switching & thumbnails
    var mainImg = document.getElementById("main-product-img");
    var thumbBtns = document.querySelectorAll(".product-thumb-btn");
    var prevBtn = document.getElementById("main-img-prev-btn");
    var nextBtn = document.getElementById("main-img-next-btn");
    var thumbPrevBtn = document.getElementById("thumb-prev-btn");
    var thumbNextBtn = document.getElementById("thumb-next-btn");
    var thumbList = document.getElementById("product-thumbnails-list");

    var currentIndex = 0;
    var images = [];
    thumbBtns.forEach(function(b) {
        images.push(b.getAttribute("data-img-src"));
    });

    function setActiveImage(idx) {
        if (images.length === 0) return;
        if (idx < 0) idx = images.length - 1;
        if (idx >= images.length) idx = 0;
        currentIndex = idx;

        if (mainImg) {
            mainImg.style.opacity = '0.3';
            mainImg.src = images[currentIndex];
            setTimeout(function() { mainImg.style.opacity = '1'; }, 120);
        }

        thumbBtns.forEach(function(btn, i) {
            if (i === currentIndex) {
                btn.className = "product-thumb-btn flex-shrink-0 w-20 h-20 overflow-hidden bg-gray-50 border-2 transition-all duration-200 rounded-lg cursor-pointer border-seyitler-primary hover:border-seyitler-primary/60 scale-105 shadow-sm";
                btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            } else {
                btn.className = "product-thumb-btn flex-shrink-0 w-20 h-20 overflow-hidden bg-gray-50 border-2 transition-all duration-200 rounded-lg cursor-pointer border-gray-200 hover:border-seyitler-primary/60";
            }
        });
    }

    thumbBtns.forEach(function(btn, idx) {
        btn.addEventListener("click", function() {
            setActiveImage(idx);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener("click", function() {
            setActiveImage(currentIndex - 1);
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener("click", function() {
            setActiveImage(currentIndex + 1);
        });
    }
    if (thumbPrevBtn && thumbList) {
        thumbPrevBtn.addEventListener("click", function() {
            thumbList.scrollBy({ left: -100, behavior: 'smooth' });
        });
    }
    if (thumbNextBtn && thumbList) {
        thumbNextBtn.addEventListener("click", function() {
            thumbList.scrollBy({ left: 100, behavior: 'smooth' });
        });
    }
});
</script>