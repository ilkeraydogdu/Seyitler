<?php
/** @var array|null $page */
use App\Models\Page;
use App\Core\I18n;

$hero = $page ? Page::getHero($page) : [];
$images = $page ? Page::getImages($page) : [];
$paragraphs = $page ? Page::getParagraphs($page) : [];
$buttons = $page ? Page::getButtons($page) : [];
$locale = I18n::getLocale();

$img1 = !empty($images[0]['url']) ? $images[0]['url'] : 'assets/images/arge_1-min.webp';
$img2 = !empty($images[1]['url']) ? $images[1]['url'] : 'assets/images/arge_2-min.webp';

$video = $page ? Page::getVideo($page) : [];
$videoSrc = !empty($video['url']) ? (str_starts_with($video['url'], 'http') ? $video['url'] : asset($video['url'])) : 'https://r2-content-api.okesici.workers.dev/files/photos/ArGe.mp4';
$videoPoster = !empty($video['poster']) ? (str_starts_with($video['poster'], 'http') ? $video['poster'] : asset($video['poster'])) : asset($img1);
?>
<div>
    <!-- Hero / Breadcrumb -->
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase font-semibold"><?= e($page ? Page::getTitle($page) : 'Ar-Ge ve İnovasyon') ?></span>
                <span class="text-seyitler-txt/50">
                    <svg class="size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </span>
                <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>">
                    <?= __('Anasayfa', 'Home') ?>
                </a>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="relative pb-8">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <div class="grid grid-cols-1 gap-12">
                
                <!-- Section 1 -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-5">
                        <div class="w-full h-56 md:h-72 rounded-2xl overflow-hidden shadow-md border border-slate-100 bg-slate-50">
                            <img alt="<?= e($images[0]['alt'] ?? 'Seyitler Kimya Ar-Ge Laboratuvarı') ?>" loading="lazy" decoding="async" class="w-full h-full object-cover" src="<?= asset($img1) ?>"/>
                        </div>
                    </div>
                    <div class="md:col-span-7">
                        <div class="prose max-w-none">
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">
                                <?= e($hero['title'] ?? 'Bilimsel Güç, Yerli İnovasyonla Buluşuyor') ?>
                            </h2>
                            <?php if (!empty($hero['subtitle'])): ?>
                                <p class="text-emerald-800 font-semibold text-sm mb-4">
                                    <?= e($hero['subtitle']) ?>
                                </p>
                            <?php endif; ?>

                            <div class="space-y-4 text-seyitler-txt leading-relaxed text-sm sm:text-base">
                                <?php if (!empty($paragraphs)): ?>
                                    <?php foreach (array_slice($paragraphs, 0, 3) as $p): ?>
                                        <p><?= nl2br(e($p)) ?></p>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Seyitler Kimya, tıbbi yapışkan teknolojileri alanında yenilikçi çözümler sunan öncü bir yerli üreticidir.</p>
                                    <p>Manisa Turgutlu Organize Sanayi Bölgesi’ndeki modern tesislerinde, flaster, hidrojel ve hot-melt kaplama teknolojilerine dayalı medikal ürünleri uluslararası kalite standartlarına uygun olarak üretmektedir.</p>
                                    <p>TÜBİTAK, TÜSEB ve üniversite iş birlikleriyle yürütülen Ar-Ge projeleri, firmayı yalnızca bir üretici değil; aynı zamanda bilimsel bir çözüm ortağı haline getirmiştir.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Banner -->
                <div class="overflow-hidden rounded-2xl shadow-sm">
                    <video autoplay loop muted playsinline preload="none" poster="<?= e($videoPoster) ?>" class="w-full h-full rounded-2xl object-cover max-h-96" src="<?= e($videoSrc) ?>"></video>
                </div>

                <!-- Section 2 -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-7 order-2 md:order-1">
                        <div class="prose max-w-none space-y-4 text-seyitler-txt leading-relaxed text-sm sm:text-base">
                            <?php if (!empty($paragraphs) && count($paragraphs) > 3): ?>
                                <?php foreach (array_slice($paragraphs, 3) as $p): ?>
                                    <p><?= nl2br(e($p)) ?></p>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Laboratuvar altyapımız; mikrobiyolojik, fiziksel ve kimyasal test laboratuvarlarını, ayrıca yeni formülasyon geliştirme ve prototip üretim alanlarını içerir.</p>
                                <p>Bu kapsamda ürünlerin klinik güvenliği, yapışma performansı, cilt uyumluluğu ve uzun süreli stabilitesi bilimsel testlerle değerlendirilir.</p>
                                <p>Her proje, “Bilimden ürüne, üründen sağlığa” prensibiyle yürütülür — çünkü inovasyon, Seyitler Kimya’da şirket kültürünün merkezidir.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="md:col-span-5 order-1 md:order-2">
                        <div class="w-full h-56 md:h-72 rounded-2xl overflow-hidden shadow-md border border-slate-100 bg-slate-50">
                            <img alt="<?= e($images[1]['alt'] ?? 'Seyitler Kimya İnovasyon ve Test Merkezi') ?>" loading="lazy" decoding="async" class="w-full h-full object-cover" src="<?= asset($img2) ?>"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Swiper Gallery -->
    <section class="relative py-8">
        <div class="px-0 mx-auto w-full">
            <div class="swiper px-4 gallery-swiper">
                <div class="swiper-wrapper">
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <div class="swiper-slide !w-auto">
                            <img alt="Seyitler Kimya Ar-Ge Laboratuvarı <?= $i ?>" loading="lazy" decoding="async" class="h-40 w-auto object-cover rounded-xl shadow-xs cursor-pointer select-none" src="<?= asset('assets/images/ArGe_0' . $i . '.jpg') ?>"/>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (typeof Swiper !== "undefined" && document.querySelector(".gallery-swiper")) {
        new Swiper(".gallery-swiper", {
            slidesPerView: "auto",
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            speed: 800,
        });
    }
});
</script>