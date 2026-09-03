<?php
use App\Models\Product;
use App\Models\Category;

/** @var array $products */
/** @var array $categories */
?>

<!-- Hero Swiper Section -->
<div class="relative">
    <div class="swiper hero-swiper" id="hero-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="relative">
                    <img alt="Seyitler Kimya" class="max-h-[600px] w-full object-cover" loading="eager" src="<?= asset('assets/images/Seyitker_Anasayfa_03-min.webp') ?>"/>
                    <div class="absolute top-0 z-10 w-full px-5 pt-10">
                        <div class="mx-auto space-y-2 text-white max-w-7xl sm:space-y-10">
                            <h3 class="text-lg break-words sm:text-7xl">
                                <?= __('Dünya Seyitler\'i', 'Dünya Seyitler\'i') ?> <br/> <b><?= __('Tercih Ediyor!', 'Tercih Ediyor!') ?></b>
                            </h3>
                            <p class="text-sm sm:text-2xl font-light max-w-[600px]">
                                <?= __('Orta Doğu, Afrika, Türk Cumhuriyetleri, Avrupa ve Amerika başta olmak üzere 17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır. Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.', 'Orta Doğu, Afrika, Türk Cumhuriyetleri, Avrupa ve Amerika başta olmak üzere 17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır. Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.') ?>
                            </p>
                        </div>
                    </div>
                    <div class="absolute top-0 bottom-0 left-0 right-0 z-0 bg-seyitler-primary/20"></div>
                </div>
            </div>
            
            <div class="swiper-slide">
                <div class="relative">
                    <img alt="Seyitler Kimya" class="max-h-[600px] w-full object-cover" loading="eager" src="<?= asset('assets/images/Seyitker_Anasayfa_02-min.webp') ?>"/>
                    <div class="absolute top-0 z-10 w-full px-5 pt-10">
                        <div class="mx-auto space-y-2 text-white max-w-7xl sm:space-y-10">
                            <h3 class="text-lg break-words sm:text-7xl">
                                <?= __('Sağlıkta Güvenin', 'Sağlıkta Güvenin') ?> <br/> <b><?= __('Global Adı', 'Global Adı') ?></b>
                            </h3>
                            <p class="text-sm sm:text-2xl font-light max-w-[600px]">
                                <?= __('Orta Doğu, Afrika, Türk Cumhuriyetleri, Avrupa ve Amerika başta olmak üzere 17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır. Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.', 'Orta Doğu, Afrika, Türk Cumhuriyetleri, Avrupa ve Amerika başta olmak üzere 17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır. Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.') ?>
                            </p>
                        </div>
                    </div>
                    <div class="absolute top-0 bottom-0 left-0 right-0 z-0 bg-seyitler-primary/20"></div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="relative">
                    <img alt="Seyitler Kimya" class="max-h-[600px] w-full object-cover" loading="eager" src="<?= asset('assets/images/plant-picture-clean-room-equipment-stainless-steel-machines-min.webp') ?>"/>
                    <div class="absolute top-0 z-10 w-full px-5 pt-10">
                        <div class="mx-auto space-y-2 text-white max-w-7xl sm:space-y-10">
                            <h3 class="text-lg break-words sm:text-7xl">
                                <?= __('Ar-Ge ile Geleceği', 'Ar-Ge ile Geleceği') ?> <br/> <b><?= __('Şekillendiriyoruz', 'Şekillendiriyoruz') ?></b>
                            </h3>
                            <p class="text-sm sm:text-2xl font-light max-w-[600px]">
                                <?= __('Üniversite-sanayi iş birliklerimiz, teknopark yapılanmamız ve TÜBİTAK projelerimizle inovatif ürünler geliştiriyor, geleceğe bugünden hazırlanıyoruz.', 'Üniversite-sanayi iş birliklerimiz, teknopark yapılanmamız ve TÜBİTAK projelerimizle inovatif ürünler geliştiriyor, geleceğe bugünden hazırlanıyoruz.') ?>
                            </p>
                        </div>
                    </div>
                    <div class="absolute top-0 bottom-0 left-0 right-0 z-0 bg-seyitler-primary/20"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Slider Feature Boxes -->
    <div class="absolute bottom-0 z-10 invisible w-full sm:visible">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-3 text-white">
                <div class="bg-seyitler-primary p-6 space-y-2 cursor-pointer transition-all hover:bg-opacity-95">
                    <div class="text-xl font-medium"><?= __('Dünya Seyitler\'i', 'Dünya Seyitler\'i') ?> <b><?= __('Tercih Ediyor!', 'Tercih Ediyor!') ?></b></div>
                    <div class="text-xs text-white/90 line-clamp-2"><?= __('17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır.', '17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır.') ?></div>
                </div>
                <div class="bg-seyitler-bg1 p-6 space-y-2 cursor-pointer transition-all hover:bg-opacity-95">
                    <div class="text-xl font-medium"><?= __('Sağlıkta Güvenin', 'Sağlıkta Güvenin') ?> <b><?= __('Global Adı', 'Global Adı') ?></b></div>
                    <div class="text-xs text-white/90 line-clamp-2"><?= __('Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.', 'Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.') ?></div>
                </div>
                <div class="bg-seyitler-bg3 p-6 space-y-2 cursor-pointer transition-all hover:bg-opacity-95">
                    <div class="text-xl font-medium"><?= __('Ar-Ge ile Geleceği', 'Ar-Ge ile Geleceği') ?> <b><?= __('Şekillendiriyoruz', 'Şekillendiriyoruz') ?></b></div>
                    <div class="text-xs text-white/90 line-clamp-2"><?= __('TÜBİTAK projelerimizle inovatif ürünler geliştiriyor, geleceğe hazırlanıyoruz.', 'TÜBİTAK projelerimizle inovatif ürünler geliştiriyor, geleceğe hazırlanıyoruz.') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="max-w-4xl px-4 mx-auto sm:max-w-7xl py-12 sm:py-16">
    <div class="grid grid-cols-2 gap-12 items-center">
        <div class="col-span-2 sm:col-span-1">
            <img alt="Seyitler Kimya Hakkımızda" class="rounded-xl shadow-lg w-full object-cover" loading="lazy" src="<?= asset('assets/images/Seyitler_Anasayfa_Hakkimizda_v2.webp') ?>"/>
        </div>
        <div class="col-span-2 space-y-5 sm:col-span-1">
            <h3 class="font-light text-3xl relative mb-4 pb-2 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-16 after:bg-seyitler-primary">
                <?= __('Hakkımızda', 'Hakkımızda') ?>
            </h3>
            <p class="text-2xl font-semibold tracking-wide text-gray-900">
                <?= __('Sağlıkta Güvenin Global Adı', 'Sağlıkta Güvenin Global Adı') ?>
            </p>
            <p class="text-seyitler-txt leading-relaxed">
                <?= __('1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.', '1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.') ?>
            </p>
            <ul class="space-y-4 text-seyitler-txt">
                <li class="flex items-start">
                    <svg class="size-5 mr-3 text-seyitler-primary shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    <span><?= __('Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz.', 'Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz.') ?></span>
                </li>
                <li class="flex items-start">
                    <svg class="size-5 mr-3 text-seyitler-primary shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    <span><?= __('Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor.', 'Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor.') ?></span>
                </li>
                <li class="flex items-start">
                    <svg class="size-5 mr-3 text-seyitler-primary shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    <span><?= __('Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız.', 'Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız.') ?></span>
                </li>
            </ul>
            <div class="pt-2">
                <a href="<?= url('/about-us') ?>" class="inline-flex items-center gap-2 px-6 py-3.5 text-white font-medium bg-seyitler-primary hover:bg-seyitler-primary/90 rounded-lg shadow-sm transition-all">
                    <span><?= __('Daha Fazla Bilgi', 'Daha Fazla Bilgi') ?></span>
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- B2B Distributor Banner -->
<div class="py-6 bg-seyitler-bg4">
    <div class="px-4 mx-auto max-w-7xl">
        <div class="grid items-center grid-cols-1 md:grid-cols-2 gap-6">
            <div class="text-sm sm:text-base font-medium text-seyitler-primary">
                <?= __('Yurt içi ve yurt dışı pazarlarda sadece bayi ve distribütörlerimiz aracılığıyla hizmet veriyor, iş ortaklarımıza özel sistemlerle güvenli ve hızlı sipariş altyapısı sunuyoruz.', 'Yurt içi ve yurt dışı pazarlarda sadece bayi ve distribütörlerimiz aracılığıyla hizmet veriyor, iş ortaklarımıza özel sistemlerle güvenli ve hızlı sipariş altyapısı sunuyoruz.') ?>
            </div>
            <div class="flex items-center md:justify-end">
                <a class="flex items-center gap-2 px-6 py-3 text-xs sm:text-sm font-semibold tracking-widest text-white uppercase bg-seyitler-primary rounded hover:bg-opacity-90 transition-colors shadow-sm" href="https://b2b.seyitler.com/" target="_blank" rel="noopener noreferrer">
                    <div><?= __('Distribütör Ekosistemine Katılın', 'Distribütör Ekosistemine Katılın') ?></div>
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Dynamic Products Showcase Section -->
<div class="px-5 mx-auto max-w-7xl xl:px-0 py-16">
    <div class="flex flex-col justify-center text-center mb-12">
        <h3 class="relative pb-4 mb-4 text-3xl font-light after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:w-20 after:h-1 after:bg-seyitler-primary">
            <?= __('Ürün Kategorileri', 'Ürün Kategorileri') ?>
        </h3>
        <p class="max-w-3xl mx-auto text-seyitler-txt text-sm sm:text-base leading-relaxed">
            <?= __('Seyitler Kimya olarak, insan sağlığını merkeze alan anlayışımızla geliştirdiğimiz tüm ürünlerde; yüksek kalite, güvenilirlik ve yenilik ilkelerini esas alıyoruz.', 'Seyitler Kimya olarak, insan sağlığını merkeze alan anlayışımızla geliştirdiğimiz tüm ürünlerde; yüksek kalite, güvenilirlik ve yenilik ilkelerini esas alıyoruz.') ?>
        </p>
    </div>

    <!-- Category Pills -->
    <div class="flex flex-wrap justify-center gap-2 mb-8">
        <a href="<?= url('/products') ?>" class="px-4 py-2 text-xs sm:text-sm font-semibold border rounded transition-colors bg-seyitler-primary text-white border-seyitler-primary">
            <?= __('Tüm Ürünler', 'Tüm Ürünler') ?>
        </a>
        <?php foreach (array_slice($categories, 0, 7) as $cat): ?>
            <a href="<?= url('/products?category=' . $cat['id']) ?>" class="px-4 py-2 text-xs sm:text-sm font-semibold border rounded transition-colors text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary hover:bg-seyitler-primary/5">
                <?= e(Category::getName($cat)) ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach (array_slice($products, 0, 8) as $prod): ?>
            <a class="group relative block overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-xl hover:border-seyitler-primary/40 flex flex-col h-full" href="<?= url('/products/' . $prod['slug']) ?>">
                <div class="relative overflow-hidden aspect-square bg-gray-50 flex items-center justify-center p-4">
                    <img alt="<?= e(Product::getTitle($prod)) ?>" class="object-contain w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy" src="<?= asset($prod['main_image']) ?>"/>
                </div>
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h4 class="mb-1 text-base font-semibold text-gray-900 group-hover:text-seyitler-primary transition-colors line-clamp-1">
                            <?= e(Product::getTitle($prod)) ?>
                        </h4>
                        <p class="text-xs leading-relaxed text-gray-500 line-clamp-2">
                            <?= e(Product::getDescription($prod)) ?>
                        </p>
                    </div>
                    <div class="mt-4 pt-2 border-t border-gray-100 flex items-center justify-between text-xs font-semibold text-seyitler-primary">
                        <span><?= __('İncele', 'İncele') ?></span>
                        <svg class="size-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-10">
        <a href="<?= url('/products') ?>" class="inline-flex items-center gap-2 px-8 py-3.5 text-sm font-semibold tracking-wider text-white uppercase bg-seyitler-primary hover:bg-seyitler-primary/90 rounded-lg shadow-sm transition-all">
            <?= __('Tüm Ürünleri Gör', 'Tüm Ürünleri Gör') ?>
            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
        </a>
    </div>
</div>

<!-- Production Power Stats Banner -->
<div class="relative bg-cover bg-center py-24 sm:py-32 before:absolute before:inset-0 before:bg-blue-900/60 before:z-0" style="background-image: url('<?= asset('assets/images/uretimde_guc_kalitede_istikrar.webp') ?>');">
    <div class="relative z-10 flex flex-col justify-center text-center text-white max-w-7xl mx-auto px-4">
        <h3 class="text-3xl sm:text-6xl font-light">
            <?= __('Üretimde Güç, Kalitede İstikrar', 'Üretimde Güç, Kalitede İstikrar') ?>
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 mt-16">
            <div class="flex flex-col items-center gap-4">
                <div class="p-4 border border-white/40 rounded-full bg-white/10 backdrop-blur-sm">
                    <svg class="size-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>
                </div>
                <h4 class="text-4xl sm:text-6xl font-extralight">17.257 m²</h4>
                <p class="text-lg font-light tracking-wide text-white/90">
                    <?= __('Kapalı Alanda Modern Üretim Tesisi', 'Kapalı Alanda Modern Üretim Tesisi') ?>
                </p>
            </div>
            
            <div class="flex flex-col items-center gap-4">
                <div class="p-4 border border-white/40 rounded-full bg-white/10 backdrop-blur-sm">
                    <svg class="size-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
                </div>
                <h4 class="text-4xl sm:text-6xl font-extralight">30+</h4>
                <p class="text-lg font-light tracking-wide text-white/90">
                    <?= __('Farklı Ürün Grubu Üretimi', 'Farklı Ürün Grubu Üretimi') ?>
                </p>
            </div>

            <div class="flex flex-col items-center gap-4">
                <div class="p-4 border border-white/40 rounded-full bg-white/10 backdrop-blur-sm">
                    <svg class="size-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>
                </div>
                <h4 class="text-4xl sm:text-6xl font-extralight">51+</h4>
                <p class="text-lg font-light tracking-wide text-white/90">
                    <?= __('Ülkeye Ürün Sağlayabilecek Kapasite', 'Ülkeye Ürün Sağlayabilecek Kapasite') ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- R&D Innovation Section -->
<div class="px-4 py-16 sm:py-20 mx-auto max-w-7xl">
    <div class="flex flex-col gap-8 md:flex-row md:items-center">
        <div class="text-3xl sm:text-4xl font-semibold text-gray-900 md:w-1/3">
            <?= __('Ar-Ge ile Geleceği', 'Ar-Ge ile Geleceği') ?> <br/>
            <span class="text-seyitler-primary"><?= __('Şekillendiriyoruz', 'Şekillendiriyoruz') ?></span>
        </div>
        <div class="font-normal leading-relaxed text-seyitler-txt md:w-2/3">
            <?= __('Seyitler Kimya, sürdürülebilir büyümenin temelini bilimsel araştırma ve yenilikçi ürün geliştirme faaliyetleriyle güçlendirir. Ar-Ge merkezimiz, TÜBİTAK, TÜSEB ve seçkin üniversitelerle yürütülen ortak projeler sayesinde, tıbbi yapışkan teknolojilerinde Türkiye’nin öncü geliştirme merkezi haline gelmiştir.', 'Seyitler Kimya, sürdürülebilir büyümenin temelini bilimsel araştırma ve yenilikçi ürün geliştirme faaliyetleriyle güçlendirir. Ar-Ge merkezimiz, TÜBİTAK, TÜSEB ve seçkin üniversitelerle yürütülen ortak projeler sayesinde, tıbbi yapışkan teknolojilerinde Türkiye’nin öncü geliştirme merkezi haline gelmiştir.') ?>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            <img alt="Üniversite-Sanayi İşbirlikleri" class="w-full h-48 object-cover" loading="lazy" src="<?= asset('assets/images/universite_sanayi_isbirlikleri.webp') ?>"/>
            <div class="p-6 space-y-2">
                <h4 class="text-xl font-semibold text-gray-900"><?= __('Üniversite-Sanayi İşbirlikleri', 'Üniversite-Sanayi İşbirlikleri') ?></h4>
                <p class="text-sm text-gray-600"><?= __('Bilimsel bilgi birikiminin üretim tecrübelerimizle birleştirerek katma değeri yüksek çözümler', 'Bilimsel bilgi birikiminin üretim tecrübelerimizle birleştirerek katma değeri yüksek çözümler') ?></p>
            </div>
        </div>
        
        <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            <img alt="Teknopark İnovasyonu" class="w-full h-48 object-cover" loading="lazy" src="<?= asset('assets/images/teknopark_inovasyonu.webp') ?>"/>
            <div class="p-6 space-y-2">
                <h4 class="text-xl font-semibold text-gray-900"><?= __('Teknopark İnovasyonu', 'Teknopark İnovasyonu') ?></h4>
                <p class="text-sm text-gray-600"><?= __('Yeni nesil medikal ürünlerin tasarım, test ve prototipleme süreçleri', 'Yeni nesil medikal ürünlerin tasarım, test ve prototipleme süreçleri') ?></p>
            </div>
        </div>

        <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            <img alt="Piyasaya Sunum" class="w-full h-48 object-cover" loading="lazy" src="<?= asset('assets/images/piyasaya_sunum.webp') ?>"/>
            <div class="p-6 space-y-2">
                <h4 class="text-xl font-semibold text-gray-900"><?= __('Uluslararası Standartlar', 'Uluslararası Standartlar') ?></h4>
                <p class="text-sm text-gray-600"><?= __('CE ve ISO standartlarına uygun yüksek kaliteli medikal yapışkan üretimleri', 'CE ve ISO standartlarına uygun yüksek kaliteli medikal yapışkan üretimleri') ?></p>
            </div>
        </div>
    </div>
</div>
