<?php
$navItems = [
    ['title' => __('ANASAYFA', 'ANASAYFA'), 'url' => url('/'), 'path' => '/'],
    ['title' => __('KURUMSAL', 'KURUMSAL'), 'url' => url('/about-us'), 'path' => '/about-us'],
    ['title' => __('ÜRÜNLER', 'ÜRÜNLER'), 'url' => url('/products'), 'path' => '/products'],
    ['title' => __('YATIRIMCI İLİŞKİLERİ', 'Yatırımcı İlişkileri'), 'url' => url('/investors'), 'path' => '/investors'],
    ['title' => __('AR-GE ve İNOVASYON', 'AR-GE ve İNOVASYON'), 'url' => url('/rd'), 'path' => '/rd'],
    ['title' => __('FAALİYET ALANLARI', 'FAALİYET ALANLARI'), 'url' => url('/areas'), 'path' => '/areas'],
    ['title' => __('İLETİŞİM', 'İLETİŞİM'), 'url' => url('/contact'), 'path' => '/contact'],
];
?>
<header class="sticky top-0 bg-white/95 backdrop-blur-md shadow-sm flex flex-col w-full transition-all z-[60] duration-150 border-b border-gray-100">
    <div>
        <nav class="mx-auto max-w-[86rem] px-4 sm:px-6 lg:px-8">
            <div class="z-10">
                <div class="flex items-center justify-between w-full h-20">
                    <div class="flex items-center">
                        <a class="inline-flex items-center" href="<?= url('/') ?>" title="Seyitler Kimya">
                            <span class="sr-only">Seyitler Kimya - Sağlık Üretiyoruz</span>
                            <img alt="Seyitler Kimya - Sağlık Üretiyoruz" class="w-auto h-12 sm:h-14 transition-transform hover:scale-105" src="<?= asset('assets/images/seyitler_yatay_logo.png') ?>"/>
                        </a>
                    </div>
                    
                    <!-- Desktop Nav -->
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex items-center justify-center h-full pr-2 space-x-1 xl:space-x-2">
                            <?php foreach ($navItems as $item): ?>
                                <?php $isActive = is_active_route($item['path']); ?>
                                <div class="relative group">
                                    <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.08em] uppercase px-3.5 py-2.5 rounded-sm transition-all duration-200 <?= $isActive ? 'bg-[#0AA64D] text-white shadow-sm' : 'text-[#555] hover:text-[#0AA64D] hover:bg-gray-50' ?>" href="<?= $item['url'] ?>">
                                        <span><?= e($item['title']) ?></span>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex items-center justify-center space-x-3 lg:hidden">
                        <button class="text-[#0AA64D] p-2 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" id="mobile-menu-btn" aria-label="Menü" type="button">
                            <svg class="size-6" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" x2="20" y1="12" y2="12"></line>
                                <line x1="4" x2="20" y1="6" y2="6"></line>
                                <line x1="4" x2="20" y1="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-drawer" class="lg:hidden hidden bg-white border-b border-gray-200 shadow-xl px-4 pt-2 pb-6 space-y-1">
        <?php foreach ($navItems as $item): ?>
            <?php $isActive = is_active_route($item['path']); ?>
            <a class="block px-4 py-3 rounded-lg text-sm font-semibold uppercase tracking-wider <?= $isActive ? 'bg-[#0AA64D] text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-[#0AA64D]' ?>" href="<?= $item['url'] ?>">
                <?= e($item['title']) ?>
            </a>
        <?php endforeach; ?>
        
        <!-- Mobile language picker -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-center gap-4 text-xs font-semibold">
            <span class="text-gray-400">Dil:</span>
            <a href="?lang=tr" class="px-2.5 py-1 rounded <?= current_locale() === 'tr' ? 'bg-[#0AA64D] text-white' : 'text-gray-600 bg-gray-100' ?>">TR</a>
            <a href="?lang=en" class="px-2.5 py-1 rounded <?= current_locale() === 'en' ? 'bg-[#0AA64D] text-white' : 'text-gray-600 bg-gray-100' ?>">EN</a>
            <a href="?lang=ar" class="px-2.5 py-1 rounded <?= current_locale() === 'ar' ? 'bg-[#0AA64D] text-white' : 'text-gray-600 bg-gray-100' ?>">AR</a>
        </div>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const drawer = document.getElementById('mobile-drawer');
    if (mobileBtn && drawer) {
        mobileBtn.addEventListener('click', () => {
            drawer.classList.toggle('hidden');
        });
    }
});
</script>
