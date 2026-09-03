<?php
/** @var array|null $page */
use App\Models\Page;

$title = $page ? Page::getTitle($page) : 'KVKK Aydınlatma Metni';
$content = $page ? Page::getContent($page) : '';
$paragraphs = $page ? Page::getParagraphs($page) : [];
?>
<div>
    <!-- Hero / Breadcrumb -->
    <section class="relative bg-center bg-cover py-12">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                <span class="text-seyitler-primary text-2xl uppercase font-semibold"><?= e($title) ?></span>
                <span class="text-seyitler-txt/50">
                    <svg class="size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </span>
                <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>">
                    <?= __('Anasayfa', 'Home') ?>
                </a>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="relative pb-16">
        <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
            <div class="prose max-w-none text-seyitler-txt space-y-6 text-sm sm:text-base leading-relaxed">
                <?php if (!empty($paragraphs)): ?>
                    <h2 class="text-2xl font-bold text-seyitler-primary"><?= e($title) ?></h2>
                    <?php foreach ($paragraphs as $p): ?>
                        <p><?= nl2br(e($p)) ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h2 class="text-2xl font-bold text-seyitler-primary">KİŞİSEL VERİLERİN KORUNMASI VE İŞLENMESİ AYDINLATMA METNİ</h2>
                    <p>Seyitler Kimya Sanayi A.Ş. ("Şirket") olarak, kişisel verilerinizin güvenliğine ve mahremiyetine önem veriyoruz. 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") uyarınca, veri sorumlusu sıfatıyla, kişisel verilerinizi mevzuata uygun olarak işlemekteyiz.</p>
                    <h3 class="text-xl font-semibold">1. Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi</h3>
                    <p>Kişisel verileriniz, Şirketimizle kurduğunuz ticari ilişki, web sitemiz üzerinden yapılan başvurular, iletişim formları ve çerezler aracılığıyla toplanmaktadır.</p>
                    <h3 class="text-xl font-semibold">2. Kişisel Verilerin İşlenme Amaçları</h3>
                    <p>Toplanan kişisel verileriniz; ürün ve hizmetlerin sunulabilmesi, operasyonel süreçlerin yürütülmesi ve yasal yükümlülüklerin yerine getirilmesi amacıyla işlenmektedir.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>