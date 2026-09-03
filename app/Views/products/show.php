<?php
use App\Models\Product;
use App\Models\Category;

/** @var array $product */
/** @var array $gallery */
/** @var array $features */
/** @var array $specs */
/** @var array $related */
/** @var array $categories */

$title = Product::getTitle($product);
$desc  = Product::getDescription($product);
?>

<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-8 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/products') ?>"><?= __('ÜRÜNLER', 'Ürünlerimiz') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= e($title) ?></span>
        </nav>
    </div>
</section>

<div class="py-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-10">
        
        <!-- Left Sidebar (Categories & Related Products) -->
        <aside class="w-full lg:w-72 shrink-0 space-y-8">
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h3 class="font-bold text-gray-900 text-sm tracking-wider uppercase mb-3 pb-2 border-b border-gray-100">
                    <?= __('Ürün Kategorilerimiz', 'Ürün Kategorilerimiz') ?>
                </h3>
                <div class="flex flex-col gap-1">
                    <a href="<?= url('/products') ?>" class="px-3 py-2 text-xs font-medium rounded-md transition-colors text-gray-600 hover:bg-gray-100 hover:text-seyitler-primary">
                        <?= __('Tüm Ürünler', 'Tüm Ürünler') ?>
                    </a>
                    <?php foreach ($categories as $cat): ?>
                        <?php $isCatActive = ((int)$cat['id'] === (int)$product['category_id']); ?>
                        <a href="<?= url('/products?category=' . $cat['id']) ?>" class="px-3 py-2 text-xs font-medium rounded-md transition-colors <?= $isCatActive ? 'bg-seyitler-primary text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-seyitler-primary' ?>">
                            <?= e(Category::getName($cat)) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if (!empty($related)): ?>
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <h3 class="font-bold text-gray-900 text-sm tracking-wider uppercase mb-3 pb-2 border-b border-gray-100">
                        <?= __('İlgili Ürünler', 'İlgili Ürünler') ?>
                    </h3>
                    <div class="space-y-3">
                        <?php foreach ($related as $rel): ?>
                            <a class="flex items-center gap-3 p-2 transition-colors rounded-lg group hover:bg-gray-50 border border-transparent hover:border-gray-200" href="<?= url('/products/' . $rel['slug']) ?>">
                                <div class="w-14 h-14 bg-gray-50 rounded p-1 shrink-0 flex items-center justify-center">
                                    <img alt="<?= e(Product::getTitle($rel)) ?>" class="object-contain max-h-full max-w-full" src="<?= asset($rel['main_image']) ?>"/>
                                </div>
                                <span class="text-xs font-medium text-gray-700 group-hover:text-seyitler-primary transition-colors line-clamp-2">
                                    <?= e(Product::getTitle($rel)) ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </aside>

        <!-- Main Product Detail -->
        <main class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                
                <!-- Product Gallery (Left Column) -->
                <div>
                    <div class="relative group/main-img overflow-hidden border border-gray-200 aspect-square rounded-2xl bg-white shadow-sm flex items-center justify-center p-6">
                        <img alt="<?= e($title) ?>" class="object-contain w-full h-full transition-all duration-300" id="main-product-img" src="<?= asset($product['main_image']) ?>"/>
                        
                        <?php if (count($gallery) > 1): ?>
                            <button aria-label="Önceki Görsel" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:bg-white transition-all opacity-0 group-hover/main-img:opacity-100 cursor-pointer z-10" id="main-img-prev-btn" type="button">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                            </button>
                            <button aria-label="Sonraki Görsel" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-md border border-gray-200 flex items-center justify-center text-gray-700 hover:text-seyitler-primary hover:bg-white transition-all opacity-0 group-hover/main-img:opacity-100 cursor-pointer z-10" id="main-img-next-btn" type="button">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php if (count($gallery) > 1): ?>
                        <div class="mt-4 flex gap-2 overflow-x-auto py-2 scrollbar-hide" id="product-thumbnails-list">
                            <?php foreach ($gallery as $idx => $img): ?>
                                <button type="button" class="product-thumb-btn w-18 h-18 shrink-0 rounded-lg border-2 p-1 bg-white cursor-pointer transition-all <?= $idx === 0 ? 'border-seyitler-primary shadow-sm' : 'border-gray-200 hover:border-gray-400' ?>" data-src="<?= asset($img) ?>" data-idx="<?= $idx ?>">
                                    <img alt="Thumbnail <?= $idx + 1 ?>" class="w-full h-full object-contain pointer-events-none" src="<?= asset($img) ?>"/>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Product Info (Right Column) -->
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 uppercase"><?= e($title) ?></h1>
                    
                    <p class="mt-4 text-sm sm:text-base leading-relaxed text-gray-600">
                        <?= e($desc) ?>
                    </p>

                    <!-- Tabs Container -->
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <div class="flex border-b border-gray-200 gap-4" id="product-tabs-nav">
                            <button type="button" class="pb-3 text-sm font-bold uppercase transition-colors relative text-seyitler-primary after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0.5 after:bg-seyitler-primary cursor-pointer" id="tab-btn-features">
                                <?= __('Özellikler', 'Özellikler') ?>
                            </button>
                            <?php if (!empty($specs)): ?>
                                <button type="button" class="pb-3 text-sm font-bold uppercase transition-colors relative text-gray-500 hover:text-gray-900 cursor-pointer" id="tab-btn-table">
                                    <?= __('Tablo', 'Teknik Tablo') ?>
                                </button>
                            <?php endif; ?>
                        </div>

                        <!-- Tab: Features -->
                        <div class="py-6" id="tab-features-content">
                            <?php if (!empty($features)): ?>
                                <ul class="space-y-3">
                                    <?php foreach ($features as $feature): ?>
                                        <li class="flex items-start gap-3 text-sm text-gray-700">
                                            <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                            <span><?= e($feature) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-sm text-gray-500"><?= __('Detaylı bilgi için teknik dökümanı inceleyebilirsiniz.', 'Detaylı bilgi için teknik dökümanı inceleyebilirsiniz.') ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Tab: Specifications Table -->
                        <?php if (!empty($specs)): ?>
                            <div class="py-6 hidden" id="tab-table-content">
                                <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-sm">
                                    <table class="w-full text-left text-xs border-collapse">
                                        <thead class="bg-gray-50 text-gray-700 font-bold uppercase tracking-wider border-b border-gray-200">
                                            <tr>
                                                <th class="px-3.5 py-3"><?= __('Ölçü', 'Ölçü') ?></th>
                                                <th class="px-3.5 py-3"><?= __('En', 'En') ?></th>
                                                <th class="px-3.5 py-3"><?= __('Boy', 'Boy') ?></th>
                                                <th class="px-3.5 py-3"><?= __('Yükseklik', 'Yükseklik') ?></th>
                                                <th class="px-3.5 py-3"><?= __('Kutu İçi Adet', 'Kutu İçi') ?></th>
                                                <th class="px-3.5 py-3"><?= __('Koli İçi Adet', 'Koli İçi') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                                            <?php foreach ($specs as $s): ?>
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <td class="px-3.5 py-2.5 font-semibold text-gray-900"><?= e($s['size'] ?? '-') ?></td>
                                                    <td class="px-3.5 py-2.5"><?= e($s['width'] ?? '-') ?></td>
                                                    <td class="px-3.5 py-2.5"><?= e($s['length'] ?? '-') ?></td>
                                                    <td class="px-3.5 py-2.5"><?= e($s['height'] ?? '-') ?></td>
                                                    <td class="px-3.5 py-2.5"><?= e($s['box_qty'] ?? '-') ?></td>
                                                    <td class="px-3.5 py-2.5"><?= e($s['case_qty'] ?? '-') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Contact Inquiry Callout -->
                    <div class="mt-8 p-5 rounded-xl bg-gray-50 border border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900"><?= __('Bu ürün hakkında teklif veya numune ister misiniz?', 'Bu ürün hakkında teklif veya numune ister misiniz?') ?></h4>
                            <p class="text-xs text-gray-500"><?= __('Satış ve ihracat ekibimiz aynı gün içinde size dönüş yapacaktır.', 'Satış ve ihracat ekibimiz aynı gün içinde size dönüş yapacaktır.') ?></p>
                        </div>
                        <a href="<?= url('/contact?subject=' . urlencode($title)) ?>" class="px-4 py-2.5 bg-seyitler-primary text-white text-xs font-semibold uppercase tracking-wider rounded-lg hover:bg-seyitler-primary/90 transition-colors shrink-0">
                            <?= __('İletişime Geçin', 'İletişime Geçin') ?>
                        </a>
                    </div>
                </div>

            </div>
        </main>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Gallery Switcher
    const mainImg = document.getElementById('main-product-img');
    const thumbs = document.querySelectorAll('.product-thumb-btn');
    const prevBtn = document.getElementById('main-img-prev-btn');
    const nextBtn = document.getElementById('main-img-next-btn');

    let currentIndex = 0;
    const sources = Array.from(thumbs).map(btn => btn.getAttribute('data-src'));

    function updateGallery(idx) {
        if (!sources.length || !mainImg) return;
        currentIndex = (idx + sources.length) % sources.length;
        mainImg.src = sources[currentIndex];

        thumbs.forEach((btn, i) => {
            if (i === currentIndex) {
                btn.classList.add('border-seyitler-primary', 'shadow-sm');
                btn.classList.remove('border-gray-200');
            } else {
                btn.classList.remove('border-seyitler-primary', 'shadow-sm');
                btn.classList.add('border-gray-200');
            }
        });
    }

    thumbs.forEach(btn => {
        btn.addEventListener('click', () => {
            const idx = parseInt(btn.getAttribute('data-idx') || '0', 10);
            updateGallery(idx);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', () => updateGallery(currentIndex - 1));
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', () => updateGallery(currentIndex + 1));
    }

    // Tabs Switcher
    const tabFeaturesBtn = document.getElementById('tab-btn-features');
    const tabTableBtn = document.getElementById('tab-btn-table');
    const tabFeaturesContent = document.getElementById('tab-features-content');
    const tabTableContent = document.getElementById('tab-table-content');

    if (tabFeaturesBtn && tabTableBtn && tabFeaturesContent && tabTableContent) {
        tabFeaturesBtn.addEventListener('click', () => {
            tabFeaturesContent.classList.remove('hidden');
            tabTableContent.classList.add('hidden');

            tabFeaturesBtn.classList.add('text-seyitler-primary', 'after:h-0.5', 'after:bg-seyitler-primary');
            tabFeaturesBtn.classList.remove('text-gray-500');

            tabTableBtn.classList.remove('text-seyitler-primary', 'after:h-0.5', 'after:bg-seyitler-primary');
            tabTableBtn.classList.add('text-gray-500');
        });

        tabTableBtn.addEventListener('click', () => {
            tabTableContent.classList.remove('hidden');
            tabFeaturesContent.classList.add('hidden');

            tabTableBtn.classList.add('text-seyitler-primary', 'after:h-0.5', 'after:bg-seyitler-primary');
            tabTableBtn.classList.remove('text-gray-500');

            tabFeaturesBtn.classList.remove('text-seyitler-primary', 'after:h-0.5', 'after:bg-seyitler-primary');
            tabFeaturesBtn.classList.add('text-gray-500');
        });
    }
});
</script>
