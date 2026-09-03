<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Değerler', 'Değerler') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Temel Değerlerimiz', 'Temel Değerlerimiz') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    
                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('Güven', 'Güven') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('Tüm ilişkilerimizde dürüstlük ve etik sorumluluğa önem veriyoruz.', 'Tüm ilişkilerimizde dürüstlük ve etik sorumluluğa önem veriyoruz.') ?></p>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('Kalite', 'Kalite') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('Ürün ve süreçlerimizde mükemmelliği hedefliyoruz.', 'Ürün ve süreçlerimizde mükemmelliği hedefliyoruz.') ?></p>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('Şeffaflık', 'Şeffaflık') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('Faaliyetlerimizi açık, izlenebilir ve hesap verebilir şekilde yürütüyoruz.', 'Faaliyetlerimizi açık, izlenebilir ve hesap verebilir şekilde yürütüyoruz.') ?></p>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.516 0c.85.493 1.508 1.333 1.508 2.316V18"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('Yenilik', 'Yenilik') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('Ar-Ge ve teknolojiyi merkeze alarak sürekli gelişimi destekliyoruz.', 'Ar-Ge ve teknolojiyi merkeze alarak sürekli gelişimi destekliyoruz.') ?></p>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39a2.25 2.25 0 0 1 .902 1.488l.192 1.536a2.25 2.25 0 0 1-.39 1.637l-.92 1.226a2.25 2.25 0 0 1-1.636.885l-1.537.192a2.25 2.25 0 0 1-1.488-.902l-.39-.587a.89.89 0 0 0-1.595.738l.363 1.273c.088.307.014.636-.21.812a.414.414 0 0 0 .107.663l2.16 1.08c.18.09.344.232.474.421l1.135 1.135a2.25 2.25 0 0 0 3.182 0l4.243-4.243a2.25 2.25 0 0 0 0-3.182Z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('Sorumluluk', 'Sorumluluk') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('İnsan sağlığı, çevre ve topluma karşı duyarlılıkla hareket ediyoruz.', 'İnsan sağlığı, çevre ve topluma karşı duyarlılıkla hareket ediyoruz.') ?></p>
                        </div>
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-seyitler-primary flex items-center justify-center shrink-0">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= __('İş Birliği', 'İş Birliği') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed"><?= __('Çalışanlarımız, müşterilerimiz ve paydaşlarımızla ortak başarı kültürünü benimsiyoruz.', 'Çalışanlarımız, müşterilerimiz ve paydaşlarımızla ortak başarı kültürünü benimsiyoruz.') ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
