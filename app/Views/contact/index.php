<?php
$address   = site_setting('address', 'SELVİLİTEPE OSB MAH. OSB 2007. CAD. SEYITLER KIMYA SAN.A.Ş NO: 7 İÇ KAPI NO: 2 TURGUTLU / MANİSA');
$phone     = site_setting('phone', '+90 236 314 83 83');
$email     = site_setting('email', 'seyitler@seyitler.com');
$cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
$presetSubject = $_GET['subject'] ?? '';
?>

<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('İLETİŞİM', 'İletişim') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Bizimle İletişime Geçin', 'Bizimle İletişime Geçin') ?></h1>
    </div>
</section>

<!-- Contact Cards Section -->
<section class="px-4 py-12 mx-auto sm:py-16 max-w-7xl sm:px-6 lg:px-8">
    <div class="space-y-3 text-center mb-12">
        <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl"><?= __('Sadece bir mesaj uzağınızdayız', 'Sadece bir mesaj uzağınızdayız') ?></h2>
        <p class="text-sm sm:text-base text-gray-500 max-w-2xl mx-auto"><?= __('Müşteri başarı, ihracat ve Ar-Ge ekiplerimiz her zaman diliminde aynı özenle yanınızdadır.', 'Müşteri başarı, ihracat ve Ar-Ge ekiplerimiz her zaman diliminde aynı özenle yanınızdadır.') ?></p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
        <!-- Phone Card -->
        <div class="flex flex-col h-full p-6 space-y-4 border border-gray-200 rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25z"/></svg>
            </div>
            <div class="space-y-1">
                <p class="text-xs font-bold tracking-wider uppercase text-emerald-700"><?= __('Telefon', 'Telefon') ?></p>
                <p class="text-xl font-semibold text-gray-900"><a class="hover:text-seyitler-primary transition-colors" href="tel:<?= $cleanPhone ?>"><?= e($phone) ?></a></p>
                <p class="text-xs text-gray-500 pt-1"><?= __('Hafta içi 09:00 – 18:00 (GMT+3) arasında bize ulaşabilirsiniz.', 'Hafta içi 09:00 – 18:00 (GMT+3) arasında bize ulaşabilirsiniz.') ?></p>
            </div>
        </div>

        <!-- Email Card -->
        <div class="flex flex-col h-full p-6 space-y-4 border border-gray-200 rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
            </div>
            <div class="space-y-1">
                <p class="text-xs font-bold tracking-wider uppercase text-emerald-700"><?= __('E-posta', 'E-posta') ?></p>
                <p class="text-xl font-semibold text-gray-900"><a class="hover:text-seyitler-primary transition-colors" href="mailto:<?= e($email) ?>"><?= e($email) ?></a></p>
                <p class="text-xs text-gray-500 pt-1"><?= __('İş ortaklığı, tedarikçi veya ihracat taleplerinizi iletebilirsiniz.', 'İş ortaklığı, tedarikçi veya ihracat taleplerinizi iletebilirsiniz.') ?></p>
            </div>
        </div>

        <!-- Address Card -->
        <div class="flex flex-col h-full p-6 space-y-4 border border-gray-200 rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
            </div>
            <div class="space-y-1">
                <p class="text-xs font-bold tracking-wider uppercase text-emerald-700"><?= __('Merkez & Fabrika', 'Merkez & Fabrika') ?></p>
                <p class="text-sm font-semibold text-gray-900 leading-snug"><?= e($address) ?></p>
                <p class="text-xs text-gray-500 pt-1"><?= __('Ana üretim kampüsü ve genel merkezimiz.', 'Ana üretim kampüsü ve genel merkezimiz.') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Live Form & Map Section -->
<section class="bg-gray-50 py-16 border-y border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Left: Description and Info -->
            <div class="space-y-6">
                <div>
                    <span class="text-xs font-bold tracking-widest text-seyitler-primary uppercase"><?= __('Bize Yazın', 'Bize Yazın') ?></span>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1"><?= __('İhtiyaçlarınızı Anlatın', 'İhtiyaçlarınızı Anlatın') ?></h3>
                    <p class="text-sm text-gray-600 mt-2 leading-relaxed"><?= __('Distribütörlük, ürün numuneleri, kurumsal teklifler veya diğer sorularınız için formu doldurun, sizi yetkili ekibimize yönlendirelim.', 'Distribütörlük, ürün numuneleri, kurumsal teklifler veya diğer sorularınız için formu doldurun, sizi yetkili ekibimize yönlendirelim.') ?></p>
                </div>

                <div class="space-y-4 pt-2">
                    <div class="flex items-center gap-3 text-sm text-gray-700">
                        <div class="size-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        </div>
                        <span><?= __('Tüm bilgiler KVKK ve gizlilik standartlarında güvenle saklanır.', 'Tüm bilgiler KVKK ve gizlilik standartlarında güvenle saklanır.') ?></span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-700">
                        <div class="size-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        </div>
                        <span><?= __('Talebiniz en geç 1 iş günü içerisinde yanıtlanmaktadır.', 'Talebiniz en geç 1 iş günü içerisinde yanıtlanmaktadır.') ?></span>
                    </div>
                </div>

                <!-- Google Maps Embed or Image Link -->
                <div class="mt-8 rounded-2xl overflow-hidden border border-gray-200 shadow-sm">
                    <img alt="Seyitler Kimya Fabrika" class="w-full h-64 object-cover" src="<?= asset('assets/images/seyit-1024x640.webp') ?>"/>
                    <div class="p-4 bg-white flex items-center justify-between">
                        <span class="text-xs font-medium text-gray-600"><?= e($address) ?></span>
                        <a href="https://maps.app.goo.gl/tZXvQhxH2FLzGbah7" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-seyitler-primary hover:underline flex items-center gap-1 shrink-0">
                            <span>Haritada Aç</span>
                            <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Live Contact Form -->
            <div class="bg-white border border-gray-200 shadow-lg rounded-2xl p-8">
                <form action="<?= url('/contact/send') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5"><?= __('Ad Soyad', 'Ad Soyad') ?> *</label>
                            <input type="text" name="name" required placeholder="Ahmet Yılmaz" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary outline-none transition-all"/>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5"><?= __('E-posta', 'E-posta') ?> *</label>
                            <input type="email" name="email" required placeholder="isim@firma.com" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary outline-none transition-all"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5"><?= __('Telefon', 'Telefon') ?></label>
                            <input type="tel" name="phone" placeholder="+90 5XX XXX XX XX" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary outline-none transition-all"/>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5"><?= __('Konu', 'Konu') ?></label>
                            <input type="text" name="subject" value="<?= e($presetSubject) ?>" placeholder="<?= __('Distribütörlük / Numune talebi', 'Distribütörlük / Numune talebi') ?>" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary outline-none transition-all"/>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5"><?= __('Mesajınız', 'Mesajınız') ?> *</label>
                        <textarea name="message" required rows="5" placeholder="<?= __('Talebinizin detaylarını bu alanda belirtebilirsiniz...', 'Talebinizin detaylarını bu alanda belirtebilirsiniz...') ?>" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary outline-none transition-all"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 px-6 bg-seyitler-primary hover:bg-seyitler-primary/90 text-white font-semibold text-sm uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <span><?= __('Mesajı Gönder', 'Mesajı Gönder') ?></span>
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
