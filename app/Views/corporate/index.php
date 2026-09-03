<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$images = Page::getImages($page);
$paragraphs = Page::getParagraphs($page);
$buttons = Page::getButtons($page);
$locale = I18n::getLocale();
?>
<div>
    <!-- Hero Banner / Breadcrumb -->
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

    <!-- Content Body Section -->
    <section class="relative py-8">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                
                <!-- Reusable Corporate Sidebar -->
                <?php require __DIR__ . '/_sidebar.php'; ?>

                <!-- Dynamic Page Content -->
                <div class="md:col-span-8 lg:col-span-9 min-h-64">
                    <div class="prose max-w-none">
                        
                        <!-- Images Grid -->
                        <?php if (!empty($images)): ?>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-8">
                                <?php foreach ($images as $img): ?>
                                    <div class="aspect-[16/9] overflow-hidden rounded-xl border border-slate-100 shadow-sm bg-slate-50">
                                        <img alt="<?= e($img['alt'] ?? Page::getTitle($page)) ?>" src="<?= asset($img['url']) ?>" class="w-full h-full object-cover"/>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Title and Text Content -->
                        <div class="pt-2">
                            <h3 class="font-semibold text-2xl sm:text-3xl relative mb-4 pb-2 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-16 after:bg-seyitler-primary text-slate-900">
                                <?= e($hero['title'] ?? Page::getTitle($page)) ?>
                            </h3>

                            <?php if (!empty($hero['subtitle'])): ?>
                                <p class="text-emerald-800 font-semibold text-sm mb-4 leading-relaxed">
                                    <?= e($hero['subtitle']) ?>
                                </p>
                            <?php endif; ?>

                            <div class="pt-2 space-y-4 text-seyitler-txt leading-relaxed text-sm sm:text-base">
                                <?php if (!empty($paragraphs)): ?>
                                    <?php foreach ($paragraphs as $p): ?>
                                        <p><?= nl2br(e($p)) ?></p>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p><?= nl2br(e(Page::getContent($page))) ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Dynamic Action Buttons -->
                            <?php if (!empty($buttons)): ?>
                                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                                    <?php foreach ($buttons as $btn): ?>
                                        <?php 
                                        $btnText = $btn["text_{$locale}"] ?? $btn['text_tr'] ?? '';
                                        if (empty($btnText)) continue;
                                        $isPrimary = ($btn['style'] ?? 'primary') === 'primary';
                                        ?>
                                        <a href="<?= url($btn['url'] ?? '#') ?>" target="<?= e($btn['target'] ?? '_self') ?>" class="px-5 py-3 rounded-xl text-xs font-bold transition-all shadow-sm <?= $isPrimary ? 'bg-seyitler-primary hover:bg-emerald-700 text-white shadow-emerald-700/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-800' ?>">
                                            <?= e($btnText) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>