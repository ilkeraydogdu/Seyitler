<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$images = Page::getImages($page);
$paragraphs = Page::getParagraphs($page);
$locale = I18n::getLocale();

$bannerImg = !empty($images[0]['url']) ? $images[0]['url'] : 'assets/images/surdurulebilirlik-min.webp';
?>
<div>
    <!-- Hero / Breadcrumb -->
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase font-semibold"><?= e(Page::getTitle($page)) ?></span>
                <span class="text-seyitler-txt/50">
                    <svg class="size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </span>
                <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>">
                    <?= __('Kurumsal', 'Corporate') ?>
                </a>
            </nav>
        </div>
    </section>

    <!-- Content Body -->
    <section class="relative py-8">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                
                <!-- Reusable Corporate Sidebar -->
                <?php require __DIR__ . '/_sidebar.php'; ?>

                <!-- Dynamic Page Content -->
                <div class="md:col-span-8 lg:col-span-9 min-h-64">
                    <div class="prose max-w-none">
                        
                        <!-- Banner Image -->
                        <div class="w-full aspect-[5/1] md:aspect-[6/1] lg:aspect-[7/1] overflow-hidden rounded-2xl border border-slate-100 shadow-xs mb-8 bg-slate-50">
                            <img alt="<?= e(Page::getTitle($page)) ?>" src="<?= asset($bannerImg) ?>" class="w-full h-full object-cover"/>
                        </div>

                        <!-- Title -->
                        <h1 class="text-2xl md:text-3xl font-semibold mb-4 text-slate-900">
                            <?= e($hero['title'] ?? 'Bilimle Üreten, Doğaya Saygı Duyan Bir Marka') ?>
                        </h1>

                        <?php if (!empty($hero['subtitle'])): ?>
                            <p class="text-emerald-800 font-semibold text-sm mb-4 leading-relaxed">
                                <?= e($hero['subtitle']) ?>
                            </p>
                        <?php endif; ?>

                        <!-- Paragraphs -->
                        <div class="space-y-4 text-seyitler-txt leading-relaxed text-sm sm:text-base">
                            <?php if (!empty($paragraphs)): ?>
                                <?php foreach ($paragraphs as $p): ?>
                                    <p><?= nl2br(e($p)) ?></p>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p><?= nl2br(e(Page::getContent($page))) ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>