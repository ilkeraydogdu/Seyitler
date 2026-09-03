<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$sections = Page::getSectionsData($page);
$mission = $sections['mission'] ?? [];
$vision = $sections['vision'] ?? [];
$images = Page::getImages($page);
$locale = I18n::getLocale();

$missionImg = !empty($images[0]['url']) ? $images[0]['url'] : 'assets/images/misyonumuz-min.webp';
$visionImg = !empty($images[1]['url']) ? $images[1]['url'] : 'assets/images/vizyonumuz-min.webp';

$missionTitle = $mission["title_{$locale}"] ?? $mission['title_tr'] ?? 'Misyonumuz';
$missionDesc = $mission["desc_{$locale}"] ?? $mission['desc_tr'] ?? 'Sağlık sektöründe güvenilir ve kaliteli ürünler üreterek yaşamınıza değer katıyoruz. Paydaşlarımızla sürdürülebilir ilişkiler kurarken üretim süreçlerimizde şeffaflık, etik sorumluluk ve sürekli gelişim ilkelerinden ödün vermiyoruz.';

$visionTitle = $vision["title_{$locale}"] ?? $vision['title_tr'] ?? 'Vizyonumuz';
$visionDesc = $vision["desc_{$locale}"] ?? $vision['desc_tr'] ?? 'Medikal üretim alanında yeniliği, kaliteyi ve güveni temsil eden global bir marka olmak.';
$visionItems = $vision['items'] ?? [
    'Medikal üretim alanında yeniliği, kaliteyi ve güveni temsil eden global bir marka olmak,',
    'Ürün kalitemizle sağlık sektöründe referans noktası haline gelmek,',
    'Ar-Ge ve inovasyona dayalı üretim anlayışımızla geleceğin tedavi çözümlerini geliştirmek,',
    'Uluslararası pazarlarda sürdürülebilir büyüme ve güçlü iş birlikleri oluşturmak,',
    'Şeffaf yönetim anlayışıyla çalışanlarımıza, iş ortaklarımıza ve yatırımcılarımıza kalıcı değer yaratmak.'
];
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
                    <div class="prose max-w-none space-y-12">
                        
                        <!-- Mission Section -->
                        <section>
                            <div class="w-full aspect-[16/6] overflow-hidden rounded-2xl border border-slate-100 shadow-sm bg-slate-50">
                                <img alt="<?= e($missionTitle) ?>" src="<?= asset($missionImg) ?>" class="w-full h-full object-cover"/>
                            </div>
                            <div class="pt-8">
                                <h3 class="font-semibold text-3xl relative mb-4 pb-2 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-16 after:bg-seyitler-primary text-slate-900">
                                    <?= e($missionTitle) ?>
                                </h3>
                                <div class="pt-3 space-y-4 text-seyitler-txt leading-relaxed">
                                    <p><?= nl2br(e($missionDesc)) ?></p>
                                </div>
                            </div>
                        </section>

                        <!-- Vision Section -->
                        <section>
                            <div class="w-full aspect-[16/6] overflow-hidden rounded-2xl border border-slate-100 shadow-sm bg-slate-50">
                                <img alt="<?= e($visionTitle) ?>" src="<?= asset($visionImg) ?>" class="w-full h-full object-cover"/>
                            </div>
                            <div class="pt-8">
                                <h3 class="font-semibold text-3xl relative mb-4 pb-2 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-16 after:bg-seyitler-primary text-slate-900">
                                    <?= e($visionTitle) ?>
                                </h3>
                                <div class="pt-3 space-y-4 text-seyitler-txt leading-relaxed">
                                    <p><?= nl2br(e($visionDesc)) ?></p>
                                    <?php if (!empty($visionItems)): ?>
                                        <ul class="pt-2 space-y-3">
                                            <?php foreach ($visionItems as $vItem): ?>
                                                <li class="flex items-start gap-3">
                                                    <span class="mt-1.5 inline-block size-2.5 rounded-full border-2 border-seyitler-primary bg-white shrink-0"></span>
                                                    <span><?= e($vItem) ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>