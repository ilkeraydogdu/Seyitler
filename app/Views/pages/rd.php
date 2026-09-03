<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('AR-GE ve İNOVASYON', 'AR-GE ve İNOVASYON') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Ar-Ge ve İnovasyon', 'Ar-Ge ve İnovasyon') ?></h1>
    </div>
</section>

<div class="py-12 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-16">
    <!-- Block 1 -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
        <div class="md:col-span-5">
            <img alt="Seyitler Kimya Ar-Ge" class="w-full h-64 md:h-80 rounded-2xl object-cover shadow-sm border border-gray-100" src="<?= asset('assets/images/arge_1-min.webp') ?>"/>
        </div>
        <div class="md:col-span-7 space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900"><?= __('Tıbbi Yapışkan Teknolojilerinde İnovasyon', 'Tıbbi Yapışkan Teknolojilerinde İnovasyon') ?></h2>
            <div class="h-1 w-16 bg-seyitler-primary rounded-full"></div>
            <p><?= __('Seyitler Kimya, tıbbi yapışkan teknolojileri alanında yenilikçi çözümler sunan öncü bir yerli üreticidir.', 'Seyitler Kimya, tıbbi yapışkan teknolojileri alanında yenilikçi çözümler sunan öncü bir yerli üreticidir.') ?></p>
            <p><?= __('Manisa Turgutlu Organize Sanayi Bölgesi’ndeki modern tesislerinde, flaster, hidrojel ve hot-melt kaplama teknolojilerine dayalı medikal ürünleri uluslararası kalite standartlarına uygun olarak üretmektedir.', 'Manisa Turgutlu Organize Sanayi Bölgesi’ndeki modern tesislerinde, flaster, hidrojel ve hot-melt kaplama teknolojilerine dayalı medikal ürünleri uluslararası kalite standartlarına uygun olarak üretmektedir.') ?></p>
            <p><?= __('TÜBİTAK, TÜSEB ve üniversite iş birlikleriyle yürütülen Ar-Ge projeleri, firmayı yalnızca bir üretici değil; aynı zamanda bilimsel bir çözüm ortağı haline getirmiştir.', 'TÜBİTAK, TÜSEB ve üniversite iş birlikleriyle yürütülen Ar-Ge projeleri, firmayı yalnızca bir üretici değil; aynı zamanda bilimsel bir çözüm ortağı haline getirmiştir.') ?></p>
        </div>
    </div>

    <!-- Block 2: Video -->
    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-200 aspect-video max-h-[500px] w-full bg-black">
        <video autoplay class="w-full h-full object-cover" loop muted playsinline src="https://r2-content-api.okesici.workers.dev/files/photos/ArGe.mp4"></video>
    </div>

    <!-- Block 3 -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
        <div class="md:col-span-7 space-y-4 text-sm sm:text-base leading-relaxed text-gray-600 order-2 md:order-1">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900"><?= __('Bilimsel Güç, Yerli İnovasyonla Buluşuyor', 'Bilimsel Güç, Yerli İnovasyonla Buluşuyor') ?></h2>
            <div class="h-1 w-16 bg-seyitler-primary rounded-full"></div>
            <p><?= __('Laboratuvar altyapımız; mikrobiyolojik, fiziksel ve kimyasal test laboratuvarlarını, ayrıca yeni formülasyon geliştirme ve prototip üretim alanlarını içerir.', 'Laboratuvar altyapımız; mikrobiyolojik, fiziksel ve kimyasal test laboratuvarlarını, ayrıca yeni formülasyon geliştirme ve prototip üretim alanlarını içerir.') ?></p>
            <p><?= __('Bu kapsamda ürünlerin klinik güvenliği, yapışma performansı, cilt uyumluluğu ve uzun süreli stabilitesi bilimsel testlerle değerlendirilir.', 'Bu kapsamda ürünlerin klinik güvenliği, yapışma performansı, cilt uyumluluğu ve uzun süreli stabilitesi bilimsel testlerle değerlendirilir.') ?></p>
            <p><?= __('Her proje, “Bilimden ürüne, üründen sağlığa” prensibiyle yürütülür — çünkü inovasyon, Seyitler Kimya’da sadece bir hedef değil, şirket kültürünün merkezidir.', 'Her proje, “Bilimden ürüne, üründen sağlığa” prensibiyle yürütülür — çünkü inovasyon, Seyitler Kimya’da sadece bir hedef değil, şirket kültürünün merkezidir.') ?></p>
        </div>
        <div class="md:col-span-5 order-1 md:order-2">
            <img alt="Ar-Ge Laboratuvar" class="w-full h-64 md:h-80 rounded-2xl object-cover shadow-sm border border-gray-100" src="<?= asset('assets/images/arge_2-min.webp') ?>"/>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div>
        <h3 class="text-xl font-bold text-gray-900 mb-6 text-center"><?= __('Laboratuvar ve Üretim Galerisi', 'Laboratuvar ve Üretim Galerisi') ?></h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <?php $num = str_pad((string)$i, 2, '0', STR_PAD_LEFT); ?>
                <div class="overflow-hidden rounded-xl border border-gray-200 aspect-video group">
                    <img alt="ArGe <?= $num ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="<?= asset("assets/images/ArGe_{$num}.jpg") ?>"/>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
