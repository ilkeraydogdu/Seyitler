<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('KURUMSAL', 'Kurumsal') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Hakkımızda', 'Hakkımızda') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9">
                <div class="space-y-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <img alt="Seyitler Kimya Tesis" class="rounded-xl shadow-sm w-full h-56 object-cover" src="<?= asset('assets/images/hakkimizda_01.webp') ?>"/>
                        <img alt="Seyitler Kimya Üretim" class="rounded-xl shadow-sm w-full h-56 object-cover" src="<?= asset('assets/images/hakkimizda_02.webp') ?>"/>
                    </div>

                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-seyitler-primary inline-block">
                            <?= __('Sağlıkta Güvenin Global Adı', 'Sağlıkta Güvenin Global Adı') ?>
                        </h2>
                        
                        <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600 pt-2">
                            <p>
                                <?= __('1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.', '1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.') ?>
                            </p>
                            <p>
                                <?= __('Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz. Toplamda 30 farklı ürün üretirken bunların 17’sini, kendi markalarımız altında pazara sunuyoruz. Aynı anda hem kendi markamız hem de iş ortaklarımız için üretim gerçekleştirebilen bir altyapıya sahibiz.', 'Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz. Toplamda 30 farklı ürün üretirken bunların 17’sini, kendi markalarımız altında pazara sunuyoruz. Aynı anda hem kendi markamız hem de iş ortaklarımız için üretim gerçekleştirebilen bir altyapıya sahibiz.') ?>
                            </p>
                            <p>
                                <?= __('Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor. Üretim süreçlerimiz; ISO 13485, GMP ve ülke bazlı kalite sertifikaları ile destekleniyor. Bu durum, farklı coğrafyalarda aynı kalite standardını güvenle sunmamıza imkân sağlıyor.', 'Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor. Üretim süreçlerimiz; ISO 13485, GMP ve ülke bazlı kalite sertifikaları ile destekleniyor. Bu durum, farklı coğrafyalarda aynı kalite standardını güvenle sunmamıza imkân sağlıyor.') ?>
                            </p>
                            <p>
                                <?= __('Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız. Yurt içinde DMO ihaleleri ve yetkili distribütörler aracılığıyla yurt dışında ise bayiler, brokerlar, traderlar ve medikal distribütörler üzerinden satış faaliyetlerimizi yürütüyoruz.', 'Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız. Yurt içinde DMO ihaleleri ve yetkili distribütörler aracılığıyla yurt dışında ise bayiler, brokerlar, traderlar ve medikal distribütörler üzerinden satış faaliyetlerimizi yürütüyoruz.') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
