<section class="py-24 sm:py-32 flex items-center justify-center text-center">
    <div class="max-w-xl mx-auto px-4">
        <div class="size-20 bg-emerald-50 text-seyitler-primary rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm">
            <span class="text-4xl font-black">404</span>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-950 sm:text-4xl"><?= __('Sayfa Bulunamadı', 'Sayfa Bulunamadı') ?></h1>
        <p class="mt-4 text-sm sm:text-base text-gray-500 leading-relaxed">
            <?= __('Aradığınız sayfa kaldırılmış, adı değiştirilmiş veya geçici olarak kullanım dışı kalmış olabilir.', 'Aradığınız sayfa kaldırılmış, adı değiştirilmiş veya geçici olarak kullanım dışı kalmış olabilir.') ?>
        </p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="<?= url('/') ?>" class="px-6 py-3 bg-seyitler-primary hover:bg-seyitler-primary/90 text-white font-semibold text-xs sm:text-sm uppercase tracking-wider rounded-lg shadow-sm transition-all">
                <?= __('Anasayfaya Dön', 'Anasayfaya Dön') ?>
            </a>
            <a href="<?= url('/products') ?>" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-xs sm:text-sm uppercase tracking-wider rounded-lg transition-all">
                <?= __('Ürünlerimize Göz Atın', 'Ürünlerimize Göz Atın') ?>
            </a>
        </div>
    </div>
</section>
