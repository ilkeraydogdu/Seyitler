<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Misyon ve Vizyon', 'Misyon ve Vizyon') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Misyon ve Vizyonumuz', 'Misyon ve Vizyonumuz') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9 space-y-12">
                
                <!-- Misyon -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <img alt="Seyitler Kimya Misyon" class="w-full h-48 sm:h-64 object-cover" src="<?= asset('assets/images/misyonumuz-min.webp') ?>"/>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-seyitler-primary inline-block">
                            <?= __('Misyonumuz', 'Misyonumuz') ?>
                        </h2>
                        <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
                            <p><?= __('Sağlık sektöründe güvenilir ve kaliteli ürünler üreterek yaşamınıza değer katıyoruz. Paydaşlarımızla sürdürülebilir ilişkiler kurarken üretim süreçlerimizde şeffaflık, etik sorumluluk ve sürekli gelişim ilkelerinden ödün vermiyoruz.', 'Sağlık sektöründe güvenilir ve kaliteli ürünler üreterek yaşamınıza değer katıyoruz. Paydaşlarımızla sürdürülebilir ilişkiler kurarken üretim süreçlerimizde şeffaflık, etik sorumluluk ve sürekli gelişim ilkelerinden ödün vermiyoruz.') ?></p>
                            <p><?= __('Teknolojik altyapımızı ve uzman çalışan gücümüzü birleştirerek hem Türkiye’de hem de global pazarlarda güvenilir bir çözüm ortağı olmayı sürdürüyoruz.', 'Teknolojik altyapımızı ve uzman çalışan gücümüzü birleştirerek hem Türkiye’de hem de global pazarlarda güvenilir bir çözüm ortağı olmayı sürdürüyoruz.') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Vizyon -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <img alt="Seyitler Kimya Vizyon" class="w-full h-48 sm:h-64 object-cover" src="<?= asset('assets/images/vizyonumuz-min.webp') ?>"/>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-seyitler-primary inline-block">
                            <?= __('Vizyonumuz', 'Vizyonumuz') ?>
                        </h2>
                        <ul class="space-y-3 text-sm sm:text-base text-gray-600 pt-2">
                            <li class="flex items-start gap-3">
                                <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span><?= __('Medikal üretim alanında yeniliği, kaliteyi ve güveni temsil eden global bir marka olmak,', 'Medikal üretim alanında yeniliği, kaliteyi ve güveni temsil eden global bir marka olmak,') ?></span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span><?= __('Ürün kalitemizle sağlık sektöründe, referans noktası haline gelmek,', 'Ürün kalitemizle sağlık sektöründe, referans noktası haline gelmek,') ?></span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span><?= __('Ar-Ge ve inovasyona dayalı üretim anlayışımızla geleceğin tedavi çözümlerini geliştirmek,', 'Ar-Ge ve inovasyona dayalı üretim anlayışımızla geleceğin tedavi çözümlerini geliştirmek,') ?></span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span><?= __('Uluslararası pazarlarda, sürdürülebilir büyüme ve güçlü iş birlikleri oluşturmak,', 'Uluslararası pazarlarda, sürdürülebilir büyüme ve güçlü iş birlikleri oluşturmak,') ?></span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="size-5 text-seyitler-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span><?= __('Şeffaf yönetim anlayışıyla çalışanlarımıza, iş ortaklarımıza ve yatırımcılarımıza kalıcı değer yaratmak.', 'Şeffaf yönetim anlayışıyla çalışanlarımıza, iş ortaklarımıza ve yatırımcılarımıza kalıcı değer yaratmak.') ?></span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
