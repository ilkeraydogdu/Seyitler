<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Sürdürülebilirlik', 'Sürdürülebilirlik') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Sürdürülebilirlik', 'Sürdürülebilirlik') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9">
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <img alt="Sürdürülebilirlik" class="w-full h-48 sm:h-64 object-cover" src="<?= asset('assets/images/surdurulebilirlik-min.webp') ?>"/>
                    
                    <div class="p-8 space-y-6">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 pb-2 border-b-2 border-seyitler-primary inline-block">
                            <?= __('Bilimle Üreten, Doğaya Saygı Duyan Bir Marka', 'Bilimle Üreten, Doğaya Saygı Duyan Bir Marka') ?>
                        </h2>

                        <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
                            <p><?= __('Seyitler Kimya’da sürdürülebilirlik, yalnızca bir çevre politikası değil; üretim anlayışımızın temelidir.', 'Seyitler Kimya’da sürdürülebilirlik, yalnızca bir çevre politikası değil; üretim anlayışımızın temelidir.') ?></p>
                            <p><?= __('Her ürün, her proses ve her yatırım; enerji verimliliği, atık yönetimi ve çalışan sağlığı kriterleri dikkate alınarak planlanır.', 'Her ürün, her proses ve her yatırım; enerji verimliliği, atık yönetimi ve çalışan sağlığı kriterleri dikkate alınarak planlanır.') ?></p>
                            <p><?= __('Üretim tesislerimizde kullanılan sistemler; düşük emisyonlu hot-melt teknolojileri, geri dönüştürülebilir ambalaj malzemeleri ve atık azaltma odaklı üretim planları ile desteklenir.', 'Üretim tesislerimizde kullanılan sistemler; düşük emisyonlu hot-melt teknolojileri, geri dönüştürülebilir ambalaj malzemeleri ve atık azaltma odaklı üretim planları ile desteklenir.') ?></p>
                            <p><?= __('Bu sayede hem üretim verimliliği artar, hem de çevresel ayak izimiz en aza indirilir.', 'Bu sayede hem üretim verimliliği artar, hem de çevresel ayak izimiz en aza indirilir.') ?></p>
                            <p><?= __('Etik üretim, sadece çevreyle değil, insanla da ilgilidir. Seyitler Kimya, eşitlikçi çalışma ilkeleri, güvenli iş ortamı ve kadın istihdamını destekleyen politikalarıyla kurumsal sorumluluğunu her kademede sürdürür.', 'Etik üretim, sadece çevreyle değil, insanla da ilgilidir. Seyitler Kimya, eşitlikçi çalışma ilkeleri, güvenli iş ortamı ve kadın istihdamını destekleyen politikalarıyla kurumsal sorumluluğunu her kademede sürdürür.') ?></p>
                            <p class="font-medium text-seyitler-primary pt-2"><?= __('Sürdürülebilirlik yaklaşımımız, “bilimsel üretim – sosyal sorumluluk – çevresel duyarlılık” üçgeni üzerine kuruludur.', 'Sürdürülebilirlik yaklaşımımız, “bilimsel üretim – sosyal sorumluluk – çevresel duyarlılık” üçgeni üzerine kuruludur.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
