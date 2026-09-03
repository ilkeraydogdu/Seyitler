<?php
/** @var array|null $page */
use App\Models\Page;
use App\Core\I18n;

$hero = $page ? Page::getHero($page) : [];
$images = $page ? Page::getImages($page) : [];
$paragraphs = $page ? Page::getParagraphs($page) : [];
$buttons = $page ? Page::getButtons($page) : [];
$locale = I18n::getLocale();

$posterImg = !empty($images[0]['url']) ? $images[0]['url'] : 'assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp';
?>
<div>
    <!-- Hero / Breadcrumb -->
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase font-semibold"><?= e($page ? Page::getTitle($page) : 'Faaliyet Alanları') ?></span>
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
            
            <!-- Video Showcase -->
            <div class="overflow-hidden rounded-2xl mb-8 shadow-sm">
                <video autoplay loop muted playsinline preload="none" poster="<?= asset($posterImg) ?>" class="w-full h-full rounded-2xl object-cover max-h-96" src="https://r2-content-api.okesici.workers.dev/files/photos/FaaliyetAlanlari.mp4"></video>
            </div>

            <!-- Dynamic Text Content -->
            <div class="prose max-w-none">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">
                    <?= e($hero['title'] ?? 'Dünya Genelinde Sağlık Sektörünün Güvenilir Ortağı') ?>
                </h2>
                <?php if (!empty($hero['subtitle'])): ?>
                    <p class="text-emerald-800 font-semibold text-sm mb-6 leading-relaxed">
                        <?= e($hero['subtitle']) ?>
                    </p>
                <?php endif; ?>

                <div class="space-y-4 text-seyitler-txt leading-relaxed text-sm sm:text-base">
                    <?php if (!empty($paragraphs)): ?>
                        <?php foreach ($paragraphs as $p): ?>
                            <p><?= nl2br(e($p)) ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.</p>
                        <p>Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.</p>
                        <p>Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.</p>
                        <p>Distribütör ve iş ortaklarımıza, sadece ürün değil; teknik dokümantasyon, eğitim, test ve satış sonrası destek sağlayarak uzun vadeli iş birliği modelleri sunuyoruz.</p>
                        <p>51 ülkeye ürün sağlayabilecek üretim kapasitesine sahip global ölçekte faaliyet gösteren profesyonel bir üretim tesisiyiz.</p>
                    <?php endif; ?>
                </div>

                <!-- Action Buttons if defined -->
                <?php if (!empty($buttons)): ?>
                    <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                        <?php foreach ($buttons as $btn): ?>
                            <?php 
                            $btnText = $btn["text_{$locale}"] ?? $btn['text_tr'] ?? '';
                            if (empty($btnText)) continue;
                            ?>
                            <a href="<?= url($btn['url'] ?? '#') ?>" target="<?= e($btn['target'] ?? '_self') ?>" class="px-5 py-3 rounded-xl text-xs font-bold bg-seyitler-primary hover:bg-emerald-700 text-white transition-all shadow-sm">
                                <?= e($btnText) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
</div>