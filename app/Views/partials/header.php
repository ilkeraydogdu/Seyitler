<header class="sticky top-0 bg-white/95 backdrop-blur-md shadow-md flex flex-col w-full transition-all z-[60] duration-150">
    <div>
        <nav class="mx-auto max-w-[86rem] px-4 sm:px-6 lg:px-8">
            <div class="z-10">
                <div class="flex items-center justify-between w-full h-20 lg:w-auto">
                    <div class="flex">
                        <a class="inline-flex items-center" href="<?= url('/') ?>">
                            <span class="sr-only"><?= e(\App\Models\SiteSetting::get('site_title', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?></span>
                            <img alt="<?= e(\App\Models\SiteSetting::get('site_title', 'Seyitler Kimya')) ?>" class="w-auto h-14" src="<?= asset(\App\Models\SiteSetting::get('site_logo', 'assets/images/seyitler_yatay_logo.png')) ?>"/>
                        </a>
                    </div>

                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex items-center justify-center h-full pr-5 space-x-3">
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/') ?>">
                                    <span><?= __('menu_home', 'ANASAYFA') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/about-us') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/about-us') ?>">
                                    <span><?= __('menu_corporate', 'KURUMSAL') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/products') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/products') ?>">
                                    <span><?= __('menu_products', 'ÜRÜNLER') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/investors') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/investors') ?>">
                                    <span><?= __('menu_investors', 'YATIRIMCI İLİŞKİLERİ') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/rd') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/rd') ?>">
                                    <span><?= __('menu_rd', 'AR-GE VE İNOVASYON') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/areas') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/areas') ?>">
                                    <span><?= __('menu_areas', 'FAALİYET ALANLARI') ?></span>
                                </a>
                            </div>
                            <div class="relative group">
                                <a class="flex items-center gap-2 text-xs font-semibold tracking-[0.1em] uppercase px-4 py-3 rounded-sm transition-all duration-200 whitespace-nowrap <?= is_active_route('/contact') ? 'bg-[#0AA64D] text-white' : 'text-[#6E6E6E] hover:text-[#0AA64D]' ?>" href="<?= url('/contact') ?>">
                                    <span><?= __('menu_contact', 'İLETİŞİM') ?></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center space-x-5">
                        <button class="text-[#0AA64D] flex lg:hidden" name="mobile" type="button" aria-label="Mobil Menüyü Aç">
                            <svg class="lucide lucide-menu-icon" fill="none" height="24" prefix="fas" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
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
</header>
