<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Organizasyon Yapısı', 'Organizasyon Yapısı') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Organizasyon Yapısı', 'Organizasyon Yapısı') ?></h1>
    </div>
</section>

<section class="py-12">
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Shared Sidebar -->
            <?php \App\Core\View::partial('corporate/_sidebar'); ?>

            <!-- Main Content Area -->
            <div class="md:col-span-8 lg:col-span-9">
                <!-- Tabs Navigation -->
                <div class="w-full border-b border-gray-200">
                    <div class="flex gap-6">
                        <button id="org-tab-btn-message" class="text-seyitler-primary border-seyitler-primary font-bold -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 transition-colors cursor-pointer" type="button">
                            <?= __('Başkanın Mesajı', 'Başkanın Mesajı') ?>
                        </button>
                        <button id="org-tab-btn-chart" class="text-gray-500 hover:text-gray-800 -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 border-transparent transition-colors cursor-pointer" type="button">
                            <?= __('Yönetim Şeması', 'Yönetim Şeması') ?>
                        </button>
                    </div>
                </div>

                <!-- Tab 1: Chairman Message -->
                <div id="org-panel-message" class="pt-8">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                        <div class="lg:col-span-1">
                            <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-sm">
                                <img alt="Prof.Dr. Mehmet Faysal GÖKALP" class="w-full aspect-[4/5] object-cover" src="<?= asset('assets/images/mehmet_faysal_gokalp.jpeg') ?>"/>
                                <div class="p-4 bg-gray-50 text-center">
                                    <h4 class="font-bold text-gray-900 text-sm">Prof. Dr. Mehmet Faysal GÖKALP</h4>
                                    <p class="text-xs text-seyitler-primary font-medium mt-0.5">Yönetim Kurulu Başkanı / Genel Müdür</p>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-4">
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900"><?= __('Bilimle Üretmek, Güvenle Büyümek', 'Bilimle Üretmek, Güvenle Büyümek') ?></h2>
                            <div class="h-1 w-16 bg-seyitler-primary rounded-full"></div>

                            <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600 pt-2">
                                <p class="font-semibold text-gray-800"><?= __('Değerli İş Ortaklarımız,', 'Değerli İş Ortaklarımız,') ?></p>
                                <p><?= __('Seyitler Kimya olarak, Türkiye’nin medikal cihaz üretim gücünü bilimsel inovasyonla buluşturduğumuz 30 yılı aşkın bir yolculuğun gururunu yaşıyoruz.', 'Seyitler Kimya olarak, Türkiye’nin medikal cihaz üretim gücünü bilimsel inovasyonla buluşturduğumuz 30 yılı aşkın bir yolculuğun gururunu yaşıyoruz.') ?></p>
                                <p><?= __('Manisa Turgutlu’daki tesislerimizde geliştirdiğimiz ürünler, yalnızca ulusal pazarda değil, dünya çapında sağlık profesyonellerinin güvenini kazanmıştır.', 'Manisa Turgutlu’daki tesislerimizde geliştirdiğimiz ürünler, yalnızca ulusal pazarda değil, dünya çapında sağlık profesyonellerinin güvenini kazanmıştır.') ?></p>
                                <p><?= __('Her projemizde “bilimden ürüne, üründen sağlığa” yaklaşımını benimsiyor; üretim teknolojilerimizi sürekli geliştirerek ülkemizin katma değerli üretim hedeflerine katkı sağlıyoruz.', 'Her projemizde “bilimden ürüne, üründen sağlığa” yaklaşımını benimsiyor; üretim teknolojilerimizi sürekli geliştirerek ülkemizin katma değerli üretim hedeflerine katkı sağlıyoruz.') ?></p>
                                <p><?= __('Ar-Ge merkezimiz, TÜBİTAK ve TÜSEB destekli projeleriyle yeni nesil tıbbi yapışkan teknolojileri geliştirirken; ihracat ağımız, yerli üretimi global sahneye taşımaktadır.', 'Ar-Ge merkezimiz, TÜBİTAK ve TÜSEB destekli projeleriyle yeni nesil tıbbi yapışkan teknolojileri geliştirirken; ihracat ağımız, yerli üretimi global sahneye taşımaktadır.') ?></p>
                                <p><?= __('Geleceğe dair vizyonumuz nettir: inovasyon, sürdürülebilirlik ve insan odaklı üretim ilkeleriyle her geçen gün daha güçlü bir Seyitler Kimya inşa etmek.', 'Geleceğe dair vizyonumuz nettir: inovasyon, sürdürülebilirlik ve insan odaklı üretim ilkeleriyle her geçen gün daha güçlü bir Seyitler Kimya inşa etmek.') ?></p>
                                <p><?= __('Üretime emek veren tüm ekip arkadaşlarımıza, iş ortaklarımıza ve bizi tercih eden sağlık profesyonellerine içten teşekkürlerimi sunarım.', 'Üretime emek veren tüm ekip arkadaşlarımıza, iş ortaklarımıza ve bizi tercih eden sağlık profesyonellerine içten teşekkürlerimi sunarım.') ?></p>
                                <p class="pt-4 font-semibold text-gray-900">
                                    <?= __('Saygılarımla,', 'Saygılarımla,') ?><br/>
                                    Prof. Dr. Mehmet Faysal GÖKALP<br/>
                                    <span class="text-xs font-normal text-gray-500">Yönetim Kurulu Başkanı / Genel Müdür</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Management Chart -->
                <div id="org-panel-chart" class="pt-8 hidden">
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 text-center space-y-6">
                        <h3 class="text-xl font-bold text-gray-900"><?= __('Seyitler Kimya Yönetim Organizasyon Şeması', 'Seyitler Kimya Yönetim Organizasyon Şeması') ?></h3>
                        <p class="text-xs sm:text-sm text-gray-500 max-w-xl mx-auto"><?= __('Genel Kurul, Yönetim Kurulu, Denetim Komitesi ve İcra Kurulu başkanlıklarından oluşan kurumsal yönetim yapımız.', 'Genel Kurul, Yönetim Kurulu, Denetim Komitesi ve İcra Kurulu başkanlıklarından oluşan kurumsal yönetim yapımız.') ?></p>
                        
                        <div class="max-w-md mx-auto space-y-3">
                            <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm font-bold text-seyitler-primary">
                                GENEL KURUL
                            </div>
                            <div class="w-0.5 h-6 bg-gray-300 mx-auto"></div>
                            <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm font-bold text-gray-800">
                                YÖNETİM KURULU
                            </div>
                            <div class="w-0.5 h-6 bg-gray-300 mx-auto"></div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-3 bg-white border border-gray-200 rounded-xl text-xs font-semibold text-gray-700">Denetimden Sorumlu Komite</div>
                                <div class="p-3 bg-white border border-gray-200 rounded-xl text-xs font-semibold text-gray-700">Kurumsal Yönetim Komitesi</div>
                            </div>
                            <div class="w-0.5 h-6 bg-gray-300 mx-auto"></div>
                            <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm font-bold text-emerald-800 bg-emerald-50">
                                GENEL MÜDÜRLÜK (İCRA)
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnMessage = document.getElementById('org-tab-btn-message');
    const btnChart = document.getElementById('org-tab-btn-chart');
    const panelMessage = document.getElementById('org-panel-message');
    const panelChart = document.getElementById('org-panel-chart');

    if (btnMessage && btnChart && panelMessage && panelChart) {
        btnMessage.addEventListener('click', () => {
            panelMessage.classList.remove('hidden');
            panelChart.classList.add('hidden');
            btnMessage.className = 'text-seyitler-primary border-seyitler-primary font-bold -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 transition-colors cursor-pointer';
            btnChart.className = 'text-gray-500 hover:text-gray-800 -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 border-transparent transition-colors cursor-pointer';
        });

        btnChart.addEventListener('click', () => {
            panelChart.classList.remove('hidden');
            panelMessage.classList.add('hidden');
            btnChart.className = 'text-seyitler-primary border-seyitler-primary font-bold -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 transition-colors cursor-pointer';
            btnMessage.className = 'text-gray-500 hover:text-gray-800 -mb-px pb-3 px-2 text-sm sm:text-base border-b-2 border-transparent transition-colors cursor-pointer';
        });
    }
});
</script>
