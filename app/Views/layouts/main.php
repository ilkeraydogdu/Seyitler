<!DOCTYPE html>
<html class="dark:bg-white" dir="<?= is_rtl() ? 'rtl' : 'ltr' ?>" lang="<?= current_locale() ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title><?= e($pageTitle ?? __('Seyitler Kimya - Sağlık Üretiyoruz', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?></title>
    <meta content="<?= e($pageDescription ?? __('Seyitler Kimya - Sağlık Üretiyoruz', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?>" name="description"/>
    <meta content="index,follow" name="robots"/>
    <link href="<?= asset('favicon.png') ?>" rel="icon"/>
    <link href="<?= asset('assets/images/logo.png') ?>" rel="icon"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet"/>

    <!-- Master CSS Bundle -->
    <link href="<?= asset('assets/css/style.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/swiper.BVTPDLrX.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/Navbar.B5rJp8D8.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/free-mode.BlRuW1W2.css') ?>" rel="stylesheet"/>

    <!-- Hreflang Tags for International SEO -->
    <link rel="alternate" hreflang="tr" href="<?= url($_SERVER['REQUEST_URI'] ?? '/') ?>?lang=tr" />
    <link rel="alternate" hreflang="en" href="<?= url($_SERVER['REQUEST_URI'] ?? '/') ?>?lang=en" />
    <link rel="alternate" hreflang="ar" href="<?= url($_SERVER['REQUEST_URI'] ?? '/') ?>?lang=ar" />
    <link rel="alternate" hreflang="x-default" href="<?= url($_SERVER['REQUEST_URI'] ?? '/') ?>" />

    <style>
        /* RTL Specific adjustments for Arabic */
        [dir="rtl"] {
            text-align: right;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        [dir="rtl"] .lucide-chevron-right-icon,
        [dir="rtl"] .lucide-arrow-left-icon {
            transform: scaleX(-1);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased bg-white text-gray-800">
    <div id="__nuxt" class="flex flex-col min-h-screen">
        <div id="site-root" class="flex flex-col min-h-screen">
            <div class="relative overflow-x-hidden flex flex-col min-h-screen">
                <!-- Topbar -->
                <?php \App\Core\View::partial('partials/topbar'); ?>

                <!-- Header Navbar -->
                <?php \App\Core\View::partial('partials/header'); ?>

                <!-- Flash Message Alerts -->
                <?php if (has_flash('success')): ?>
                    <div class="max-w-7xl mx-auto px-4 mt-4 w-full">
                        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center gap-3 shadow-sm">
                            <svg class="size-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <span class="text-sm font-medium"><?= e(flash('success')) ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (has_flash('error')): ?>
                    <div class="max-w-7xl mx-auto px-4 mt-4 w-full">
                        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl flex items-center gap-3 shadow-sm">
                            <svg class="size-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z"/></svg>
                            <span class="text-sm font-medium"><?= e(flash('error')) ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Page Content -->
                <main class="flex-grow">
                    <?= $content ?>
                </main>

                <!-- Floating Social Links -->
                <?php \App\Core\View::partial('partials/floating_social'); ?>

                <!-- Footer -->
                <?php \App\Core\View::partial('partials/footer'); ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= asset('assets/js/swiper-bundle.min.js') ?>"></script>
    <script src="<?= asset('assets/js/main.js') ?>"></script>
</body>
</html>
