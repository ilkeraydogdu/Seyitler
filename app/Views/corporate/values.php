<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$sections = Page::getSectionsData($page);
$values = Page::getValues($page);
$locale = I18n::getLocale();

if (empty($values)) {
    $values = [
        ['title_tr' => 'Güven', 'desc_tr' => 'Tüm ilişkilerimizde dürüstlük ve etik sorumluluğa önem veriyoruz.'],
        ['title_tr' => 'Kalite', 'desc_tr' => 'Ürün ve süreçlerimizde mükemmelliği hedefliyoruz.'],
        ['title_tr' => 'Şeffaflık', 'desc_tr' => 'Faaliyetlerimizi açık, izlenebilir ve hesap verebilir şekilde yürütüyoruz.'],
        ['title_tr' => 'Yenilik', 'desc_tr' => 'Ar-Ge ve teknolojiyi merkeze alarak sürekli gelişimi destekliyoruz.'],
        ['title_tr' => 'Sorumluluk', 'desc_tr' => 'İnsan sağlığı, çevre ve topluma karşı duyarlılıkla hareket ediyoruz.'],
        ['title_tr' => 'İş Birliği', 'desc_tr' => 'Çalışanlarımız, müşterilerimiz ve paydaşlarımızla ortak başarı kültürünü benimsiyoruz.']
    ];
}
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                            <?php foreach ($values as $val): ?>
                                <?php 
                                $vTitle = $val["title_{$locale}"] ?? $val['title_tr'] ?? '';
                                $vDesc = $val["desc_{$locale}"] ?? $val['desc_tr'] ?? '';
                                ?>
                                <div class="bg-white/80 rounded-2xl p-6 border border-slate-100 shadow-xs hover:border-emerald-200 hover:shadow-md transition-all flex items-start gap-4">
                                    <div class="size-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-900 text-lg mb-1"><?= e($vTitle) ?></h4>
                                        <p class="text-sm text-seyitler-txt leading-relaxed"><?= nl2br(e($vDesc)) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>