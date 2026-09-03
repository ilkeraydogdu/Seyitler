<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Tarihçe', 'Tarihçe') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Tarihçemiz', 'Tarihçemiz') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="px-4 py-2 bg-seyitler-primary text-white font-bold text-xl rounded-lg shadow-sm">1991</span>
                        <h2 class="text-2xl font-bold text-gray-900"><?= __('Yerli Güç, Küresel Güven', 'Yerli Güç, Küresel Güven') ?></h2>
                    </div>

                    <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
                        <p>
                            <?= __('Seyitler Kimya San. A.Ş. Türkiye’de Tıbbi Plaster, yara örtüsü, ilk yardım bantları ve kapsikumlu yakı üreten, sektöründe lider bir kuruluştur.', 'Seyitler Kimya San. A.Ş. Türkiye’de Tıbbi Plaster, yara örtüsü, ilk yardım bantları ve kapsikumlu yakı üreten, sektöründe lider bir kuruluştur.') ?>
                        </p>
                        <p>
                            <?= __('1991 Yılında kurulan firmanın odak noktası, sağlık hizmeti sunanlara ve hastalara yüksek kaliteli çözümler sunan ve CE, ISO 9001, ISO 13485 ve GMP standartlarına uygun tıbbi plaster ürünleri geliştirmektir.', '1991 Yılında kurulan firmanın odak noktası, sağlık hizmeti sunanlara ve hastalara yüksek kaliteli çözümler sunan ve CE, ISO 9001, ISO 13485 ve GMP standartlarına uygun tıbbi plaster ürünleri geliştirmektir.') ?>
                        </p>
                        <p>
                            <?= __('Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.', 'Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.') ?>
                        </p>
                        <p>
                            <?= __('Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.', 'Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.') ?>
                        </p>
                        <p>
                            <?= __('Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.', 'Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.') ?>
                        </p>
                        <p>
                            <?= __('Seyitler Kimya, “Made in Türkiye” markasını sağlık teknolojilerinde ileriye taşımak hedefiyle, partnerleri ile düzenli uluslararası fuarlarda ev sahipliği yapmaktadır. Bu katılımlar, global sahnede Türk medikal sektörünün inovasyon gücünü temsil etmektedir.', 'Seyitler Kimya, “Made in Türkiye” markasını sağlık teknolojilerinde ileriye taşımak hedefiyle, partnerleri ile düzenli uluslararası fuarlarda ev sahipliği yapmaktadır. Bu katılımlar, global sahnede Türk medikal sektörünün inovasyon gücünü temsil etmektedir.') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
