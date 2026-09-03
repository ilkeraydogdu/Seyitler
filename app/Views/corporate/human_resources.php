<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/about-us') ?>"><?= __('KURUMSAL', 'Kurumsal') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('İnsan Kaynakları', 'İnsan Kaynakları') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('İnsan Kaynakları', 'İnsan Kaynakları') ?></h1>
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
                    <img alt="İnsan Kaynakları" class="w-full h-48 sm:h-64 object-cover" src="<?= asset('assets/images/insan_kaynaklari-min.webp') ?>"/>
                    
                    <div class="p-8 space-y-6">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 pb-2 border-b-2 border-seyitler-primary inline-block">
                            <?= __('İnsan Kaynakları Politikamız', 'İnsan Kaynakları Politikamız') ?>
                        </h2>

                        <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
                            <p><?= __('Seyitler Kimya olarak, üretimden yönetime kadar tüm süreçlerde görev alan çalışanlarımızı, şirketimizin sürdürülebilir başarısının temel taşı olarak görüyoruz. Bünyemizde görev yapan personelimiz; medikal üretim alanında deneyimli, kalite standartlarına hâkim, gelişime açık ve ekip çalışmasına yatkın profesyonellerden oluşuyor.', 'Seyitler Kimya olarak, üretimden yönetime kadar tüm süreçlerde görev alan çalışanlarımızı, şirketimizin sürdürülebilir başarısının temel taşı olarak görüyoruz. Bünyemizde görev yapan personelimiz; medikal üretim alanında deneyimli, kalite standartlarına hâkim, gelişime açık ve ekip çalışmasına yatkın profesyonellerden oluşuyor.') ?></p>
                            <p><?= __('Her bir çalışanımız, üretim süreçlerinde yüksek verimlilik ve kaliteyi sağlamak üzere eğitiliyor; görev tanımları net şekilde belirlenirken sorumluluk alanları, kurumsal yapımızla uyumlu şekilde yapılandırılıyor. Operatörlerimiz, makine parkurumuzu etkin şekilde kullanarak uluslararası standartlara uygun üretim gerçekleştiriyor.', 'Her bir çalışanımız, üretim süreçlerinde yüksek verimlilik ve kaliteyi sağlamak üzere eğitiliyor; görev tanımları net şekilde belirlenirken sorumluluk alanları, kurumsal yapımızla uyumlu şekilde yapılandırılıyor. Operatörlerimiz, makine parkurumuzu etkin şekilde kullanarak uluslararası standartlara uygun üretim gerçekleştiriyor.') ?></p>
                            <p><?= __('Seyitler Kimya bünyesinde görev alan personel kadromuz; uzun yıllardır bizimle birlikte yol alan, ürünleri ve üretim süreçlerini yakından tanıyan, teknik bilgi birikimi yüksek bireylerden oluşuyor. Ar-Ge, üretim, kalite kontrol, satış ve lojistik gibi farklı departmanlarda görev alan ekip üyelerimiz; hem bireysel yetkinlikleri hem de takım uyumlarıyla şirketimizin global başarısına katkı sağlıyor.', 'Seyitler Kimya bünyesinde görev alan personel kadromuz; uzun yıllardır bizimle birlikte yol alan, ürünleri ve üretim süreçlerini yakından tanıyan, teknik bilgi birikimi yüksek bireylerden oluşuyor. Ar-Ge, üretim, kalite kontrol, satış ve lojistik gibi farklı departmanlarda görev alan ekip üyelerimiz; hem bireysel yetkinlikleri hem de takım uyumlarıyla şirketimizin global başarısına katkı sağlıyor.') ?></p>
                        </div>

                        <!-- Açık Pozisyonlar Bölümü -->
                        <div class="pt-6 border-t border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?= __('Açık Pozisyonlar', 'Açık Pozisyonlar') ?></h3>
                            <p class="text-xs sm:text-sm text-gray-500 mb-6"><?= __('Güncel pozisyonlarımıza aşağıdaki alandan ulaşabilir, özgeçmişinizi doğrudan iletebilirsiniz.', 'Güncel pozisyonlarımıza aşağıdaki alandan ulaşabilir, özgeçmişinizi doğrudan iletebilirsiniz.') ?></p>
                            
                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center bg-gray-50">
                                <svg class="size-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                <p class="text-sm font-semibold text-gray-700"><?= __('Şu anda açık pozisyon bulunmamaktadır.', 'Şu anda açık pozisyon bulunmamaktadır.') ?></p>
                                <p class="text-xs text-gray-500 mt-1"><?= __('Genel başvurularınız için cv@seyitler.com adresine özgeçmişinizi gönderebilirsiniz.', 'Genel başvurularınız için cv@seyitler.com adresine özgeçmişinizi gönderebilirsiniz.') ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
