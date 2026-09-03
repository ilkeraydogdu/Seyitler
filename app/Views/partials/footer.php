<?php
use App\Models\News;

$address   = site_setting('address', 'SELVİLİTEPE OSB MAH. OSB 2007. CAD. SEYITLER KIMYA SAN.A.Ş NO: 7 İÇ KAPI NO: 2 TURGUTLU / MANİSA');
$phone     = site_setting('phone', '+90 236 314 83 83');
$email     = site_setting('email', 'seyitler@seyitler.com');
$linkedin  = site_setting('linkedin_url', 'https://www.linkedin.com/company/seyitler-kimya');
$instagram = site_setting('instagram_url', 'https://www.instagram.com/seyitlerkimya/');
$cleanPhone = preg_replace('/[^0-9+]/', '', $phone);

$latestNews = News::allActive();
?>
<footer class="text-white bg-seyitler-primary mt-auto">
    <div class="mx-auto max-w-[86rem] px-4 pb-10">
        <!-- 3 Contact Action Cards -->
        <div class="grid grid-cols-3">
            <a href="https://maps.app.goo.gl/tZXvQhxH2FLzGbah7" target="_blank" rel="noopener noreferrer" class="flex items-center justify-start col-span-3 gap-4 px-5 py-8 text-lg sm:text-xl font-light tracking-wider hover:opacity-95 transition-opacity sm:col-span-1 bg-seyitler-bg1">
                <svg class="lucide size-9 shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <div><?= __('Haritada Gör', 'Haritada Gör') ?></div>
            </a>
            
            <a href="tel:<?= $cleanPhone ?>" class="flex items-center justify-start col-span-3 gap-4 px-5 py-8 text-lg sm:text-xl font-light tracking-wider hover:opacity-95 transition-opacity sm:col-span-1 bg-seyitler-bg2">
                <svg class="lucide size-9 shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <rect height="20" rx="2" ry="2" width="14" x="5" y="2"></rect>
                    <path d="M12 18h.01"></path>
                </svg>
                <div><?= e($phone) ?></div>
            </a>

            <a href="mailto:<?= e($email) ?>" class="flex items-center justify-start col-span-3 gap-4 px-5 py-8 text-lg sm:text-xl font-light tracking-wider hover:opacity-95 transition-opacity sm:col-span-1 bg-seyitler-bg3">
                <svg class="lucide size-9 shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <rect height="16" rx="2" width="20" x="2" y="4"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
                <div><?= __('Mail Gönder', 'Mail Gönder') ?></div>
            </a>
        </div>

        <!-- Footer Columns -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-12">
            <!-- Col 1: About & Info -->
            <div class="flex flex-col space-y-5">
                <img alt="Seyitler Kimya" class="w-44 brightness-0 invert" src="<?= asset('assets/images/seyitler_yatay_logo_NEGATIF.png') ?>"/>
                <p class="text-sm leading-relaxed text-white/80">
                    <?= __('1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz.', '1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz.') ?>
                </p>
                
                <div class="space-y-3 pt-2 text-xs text-white/90">
                    <div class="flex items-start gap-2.5">
                        <svg class="size-4 text-white shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                        <span><?= e($address) ?></span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="size-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25z"/></svg>
                        <span><?= e($phone) ?></span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="size-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        <span><?= e($email) ?></span>
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <?php if (!empty($linkedin)): ?>
                        <a href="<?= e($linkedin) ?>" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full bg-white/10 hover:bg-white/25 transition-colors">
                            <svg class="size-4 fill-white" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($instagram)): ?>
                        <a href="<?= e($instagram) ?>" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full bg-white/10 hover:bg-white/25 transition-colors">
                            <svg class="size-4 fill-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="space-y-4">
                <h3 class="text-base font-semibold tracking-wider uppercase text-white border-b border-white/20 pb-2">
                    <?= __('Linkler', 'Linkler') ?>
                </h3>
                <ul class="grid grid-cols-2 gap-2 text-sm text-white/80">
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('ANASAYFA', 'Anasayfa') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/about-us') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('KURUMSAL', 'Kurumsal') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/products') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('ÜRÜNLER', 'Ürünler') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/investors') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('Yatırımcı İlişkileri', 'Yatırımcı İlişkileri') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/rd') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('AR-GE ve İNOVASYON', 'Ar-Ge ve İnovasyon') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/areas') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('FAALİYET ALANLARI', 'Faaliyet Alanları') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="<?= url('/contact') ?>"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> <?= __('İLETİŞİM', 'İletişim') ?></a></li>
                    <li><a class="flex items-center gap-1.5 hover:text-white transition-colors" href="https://kap.org.tr/tr/sirket-bilgileri/ozet/2500-seyitler-kimya-sanayi-a-s" target="_blank" rel="noopener noreferrer"><svg class="size-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg> KAP / BİST</a></li>
                </ul>
            </div>

            <!-- Col 3: Latest News / Announcements -->
            <div class="space-y-4">
                <h3 class="text-base font-semibold tracking-wider uppercase text-white border-b border-white/20 pb-2">
                    <?= __('Son Haberler', 'Son Haberler') ?>
                </h3>
                <ul class="flex flex-col gap-3">
                    <?php if (!empty($latestNews)): ?>
                        <?php foreach ($latestNews as $news): ?>
                            <li>
                                <a class="text-xs sm:text-sm inline-flex items-start gap-2 group text-white/90 hover:text-white" href="<?= e($news['link_url'] ?? '#') ?>" target="_blank" rel="noopener noreferrer">
                                    <svg class="size-3 mt-1 shrink-0 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"></path></svg>
                                    <span class="leading-snug"><?= e(News::getTitle($news)) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-xs text-white/60">Güncel haber bulunmuyor.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="px-4 bg-seyitler-bg3 mt-10 rounded-lg">
            <div class="mx-auto py-5 text-xs flex flex-col sm:flex-row justify-between items-center gap-4 text-white/75">
                <div>Copyright © <?= date('Y') ?> Seyitler Kimya Sanayi A.Ş. Tüm hakları saklıdır.</div>
                <div class="flex gap-4">
                    <a class="hover:text-white transition-colors" href="<?= url('/kvkk') ?>">KVKK Aydınlatma Metni</a>
                    <span class="opacity-30">|</span>
                    <a class="hover:text-white transition-colors" href="<?= url('/cerez-politikasi') ?>">Çerez Politikası</a>
                </div>
            </div>
        </div>
    </div>
</footer>
