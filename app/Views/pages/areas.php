<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('FAALİYET ALANLARI', 'FAALİYET ALANLARI') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Faaliyet Alanlarımız', 'Faaliyet Alanlarımız') ?></h1>
    </div>
</section>

<div class="py-12 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-12">
    <!-- Video Player -->
    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-200 aspect-video max-h-[500px] w-full bg-black">
        <video autoplay class="w-full h-full object-cover" loop muted playsinline src="https://r2-content-api.okesici.workers.dev/files/photos/FaaliyetAlanlari.mp4"></video>
    </div>

    <!-- Description Content -->
    <div class="bg-white border border-gray-200 rounded-2xl p-8 sm:p-10 shadow-sm space-y-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 pb-2 border-b-2 border-seyitler-primary inline-block">
            <?= __('Global Ölçekte Yerli Üretim Gücü', 'Global Ölçekte Yerli Üretim Gücü') ?>
        </h2>

        <div class="space-y-4 text-sm sm:text-base leading-relaxed text-gray-600">
            <p><?= __('Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.', 'Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.') ?></p>
            <p><?= __('Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.', 'Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.') ?></p>
            <p><?= __('Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.', 'Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.') ?></p>
            <p><?= __('Distribütör ve iş ortaklarımıza, sadece ürün değil; teknik dokümantasyon, eğitim, test ve satış sonrası destek sağlayarak uzun vadeli iş birliği modelleri sunuyoruz.', 'Distribütör ve iş ortaklarımıza, sadece ürün değil; teknik dokümantasyon, eğitim, test ve satış sonrası destek sağlayarak uzun vadeli iş birliği modelleri sunuyoruz.') ?></p>
            <p><?= __('51 ülkeye ürün sağlayabilecek üretim kapasitesine sahip global ölçekte faaliyet gösteren profesyonel bir üretim tesisiyiz. İhracat gerçekleştirdiğimiz ülke sayını 3 katına çıkarabilecek potansiyelimizle “Güçlü Oyuncu” pozisyonumuzu, her geçen gün daha da sağlamlaştırıyoruz.', '51 ülkeye ürün sağlayabilecek üretim kapasitesine sahip global ölçekte faaliyet gösteren profesyonel bir üretim tesisiyiz. İhracat gerçekleştirdiğimiz ülke sayını 3 katına çıkarabilecek potansiyelimizle “Güçlü Oyuncu” pozisyonumuzu, her geçen gün daha da sağlamlaştırıyoruz.') ?></p>
            <p><?= __('Bizim için ihracat, üretimi sınırların ötesine taşımaktan fazlasıdır — bilimi, kaliteyi ve insan sağlığını dünyanın her noktasına ulaştırma sorumluluğudur.', 'Bizim için ihracat, üretimi sınırların ötesine taşımaktan fazlasıdır — bilimi, kaliteyi ve insan sağlığını dünyanın her noktasına ulaştırma sorumluluğudur.') ?></p>
        </div>
    </div>
</div>
