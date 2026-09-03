<?php
/** @var array $page */
use App\Models\Page;
use App\Core\I18n;

$hero = Page::getHero($page);
$images = Page::getImages($page);
$paragraphs = Page::getParagraphs($page);
$locale = I18n::getLocale();

$leaderImg = !empty($images[0]['url']) ? $images[0]['url'] : 'assets/images/mehmet_faysal_gokalp.jpeg';
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
                        
                        <!-- Tabs -->
                        <div class="w-full border-b border-gray-200 mb-8 flex gap-6">
                            <button id="tab-btn-message" type="button" class="px-4 py-2.5 text-base font-semibold border-b-2 border-seyitler-primary text-seyitler-primary cursor-pointer transition-colors">
                                <?= __('Başkanın Mesajı', 'Chairman Message') ?>
                            </button>
                            <button id="tab-btn-chart" type="button" class="px-4 py-2.5 text-base font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-900 cursor-pointer transition-colors">
                                <?= __('Yönetim Şeması', 'Organization Chart') ?>
                            </button>
                        </div>

                        <!-- Pane 1: Message -->
                        <div id="tab-pane-message" class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                            <div class="lg:col-span-1">
                                <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-md border border-slate-100 bg-slate-50">
                                    <img alt="Prof. Dr. Mehmet Faysal GÖKALP" src="<?= asset($leaderImg) ?>" class="w-full h-full object-cover"/>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-slate-900">
                                    <?= e($hero['title'] ?? 'Başkanın Mesajı') ?>
                                </h2>
                                <?php if (!empty($hero['subtitle'])): ?>
                                    <h3 class="text-xl md:text-2xl font-medium relative mb-4 pb-2 after:absolute after:left-0 after:bottom-0 after:h-[3px] after:w-16 after:bg-seyitler-primary text-emerald-800">
                                        <?= e($hero['subtitle']) ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <div class="space-y-4 text-seyitler-txt leading-relaxed pt-2">
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

                        <!-- Pane 2: Chart -->
                        <div id="tab-pane-chart" class="hidden space-y-6">
                            <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                                <h4 class="text-lg font-bold text-slate-900 mb-2"><?= __('Seyitler Kimya Sanayi A.Ş. Yönetim Organizasyon Şeması', 'Corporate Organization Chart') ?></h4>
                                <p class="text-xs text-slate-500 max-w-md mx-auto mb-6"><?= __('Genel Kurul, Yönetim Kurulu, Denetim Komitesi ve İcra Kurulundan oluşan şeffaf ve kurumsal yönetim yapımız.', 'Our corporate governance structure.') ?></p>
                                <?php if (!empty($images[1]['url'])): ?>
                                    <img alt="Organizasyon Şeması" src="<?= asset($images[1]['url']) ?>" class="mx-auto max-w-full h-auto rounded-xl shadow-sm"/>
                                <?php else: ?>
                                    <div class="p-8 border border-dashed border-slate-300 rounded-xl bg-white text-xs text-slate-500">
                                        <?= __('Organizasyon şeması görseli admin panelden yüklenebilir.', 'Chart image can be uploaded from admin panel.') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var btnMsg = document.getElementById("tab-btn-message");
    var btnChart = document.getElementById("tab-btn-chart");
    var paneMsg = document.getElementById("tab-pane-message");
    var paneChart = document.getElementById("tab-pane-chart");

    if (btnMsg && btnChart) {
        btnMsg.addEventListener("click", function() {
            btnMsg.className = "px-4 py-2.5 text-base font-semibold border-b-2 border-seyitler-primary text-seyitler-primary cursor-pointer transition-colors";
            btnChart.className = "px-4 py-2.5 text-base font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-900 cursor-pointer transition-colors";
            if (paneMsg) paneMsg.classList.remove("hidden");
            if (paneChart) paneChart.classList.add("hidden");
        });
        btnChart.addEventListener("click", function() {
            btnChart.className = "px-4 py-2.5 text-base font-semibold border-b-2 border-seyitler-primary text-seyitler-primary cursor-pointer transition-colors";
            btnMsg.className = "px-4 py-2.5 text-base font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-900 cursor-pointer transition-colors";
            if (paneChart) paneChart.classList.remove("hidden");
            if (paneMsg) paneMsg.classList.add("hidden");
        });
    }
});
</script>