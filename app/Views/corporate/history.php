<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$timeline = Page::getTimeline($page);
$locale = I18n::getLocale();
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
                
                <!-- Reusable Sidebar -->
                <?php require __DIR__ . '/_sidebar.php'; ?>

                <!-- Dynamic Timeline Area -->
                <div class="md:col-span-8 lg:col-span-9 min-h-64">
                    <div class="prose max-w-none">
                        <div class="w-full relative space-y-8">
                            
                            <h3 class="font-semibold text-2xl md:text-3xl mb-6 relative pb-2 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-16 after:bg-seyitler-primary pt-0 mt-0 text-slate-900">
                                <?= e($hero['title'] ?? Page::getTitle($page)) ?>
                            </h3>

                            <?php if (!empty($hero['subtitle'])): ?>
                                <p class="text-emerald-800 font-semibold text-sm mb-6 leading-relaxed">
                                    <?= e($hero['subtitle']) ?>
                                </p>
                            <?php endif; ?>

                            <!-- Dynamic Timeline Milestones -->
                            <div class="space-y-6">
                                <?php foreach ($timeline as $item): ?>
                                    <?php 
                                    $itemTitle = $item["title_{$locale}"] ?? $item['title_tr'] ?? '';
                                    $itemDesc = $item["desc_{$locale}"] ?? $item['desc_tr'] ?? '';
                                    ?>
                                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start p-5 rounded-2xl bg-white border border-slate-100 shadow-xs hover:border-emerald-200 transition-colors">
                                        <div class="md:col-span-3">
                                            <span class="inline-block bg-seyitler-bg3 text-white font-bold text-lg md:text-xl px-4 py-2 rounded-xl shadow-xs">
                                                <?= e($item['year']) ?>
                                            </span>
                                        </div>
                                        <div class="md:col-span-9 space-y-2">
                                            <h4 class="font-bold text-slate-900 text-base md:text-lg">
                                                <?= e($itemTitle) ?>
                                            </h4>
                                            <p class="text-sm text-seyitler-txt leading-relaxed">
                                                <?= nl2br(e($itemDesc)) ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>