<!DOCTYPE html>
<html class="dark:bg-white" dir="<?= current_locale() === 'ar' ? 'rtl' : 'ltr' ?>" lang="<?= current_locale() ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title><?= e($pageTitle ?? \App\Models\SiteSetting::get('site_title', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?></title>
    <meta content="<?= e($pageDescription ?? \App\Models\SiteSetting::get('site_description', 'Seyitler Kimya Sanayi A.Ş. - 1991 yılından bu yana sağlık sektöründe güvenilir medikal plaster ve yara bakım ürünleri üreticisi.')) ?>" name="description"/>
    <meta content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" name="robots"/>
    <meta name="author" content="İlker Aydoğdu, Pofuduk Dijital"/>
    <meta name="designer" content="Pofuduk Dijital - https://pofudukdijital.com"/>
    <link rel="author" href="https://pofudukdijital.com"/>
    
    <!-- Canonical & Hreflang SEO -->
    <link rel="canonical" href="<?= \App\Core\Seo::canonicalUrl() ?>"/>
    <?= \App\Core\Seo::renderHreflangTags() ?>
    <?php if (!empty($pagination)): ?>
        <?= \App\Core\Seo::renderPaginationMeta($pagination['page'], $pagination['totalPages'], url('/products'), $queryParams ?? []) ?>
    <?php endif; ?>

    <!-- Open Graph & Social Media -->
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Seyitler Kimya Sanayi A.Ş."/>
    <meta property="og:title" content="<?= e($pageTitle ?? \App\Models\SiteSetting::get('site_title', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?>"/>
    <meta property="og:description" content="<?= e($pageDescription ?? \App\Models\SiteSetting::get('site_description', 'Seyitler Kimya Sanayi A.Ş.')) ?>"/>
    <meta property="og:url" content="<?= \App\Core\Seo::canonicalUrl() ?>"/>
    <meta property="og:image" content="<?= asset(\App\Models\SiteSetting::get('site_logo', 'assets/images/logo.png')) ?>"/>
    <meta property="og:locale" content="<?= current_locale() === 'ar' ? 'ar_AR' : (current_locale() === 'en' ? 'en_US' : 'tr_TR') ?>"/>

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="<?= e($pageTitle ?? \App\Models\SiteSetting::get('site_title', 'Seyitler Kimya - Sağlık Üretiyoruz')) ?>"/>
    <meta name="twitter:description" content="<?= e($pageDescription ?? \App\Models\SiteSetting::get('site_description', 'Seyitler Kimya Sanayi A.Ş.')) ?>"/>
    <meta name="twitter:image" content="<?= asset(\App\Models\SiteSetting::get('site_logo', 'assets/images/logo.png')) ?>"/>

    <!-- Favicons -->
    <link href="<?= asset(\App\Models\SiteSetting::get('site_favicon', 'assets/images/favicon.png')) ?>" rel="icon"/>
    <link href="<?= asset(\App\Models\SiteSetting::get('site_favicon', 'assets/images/favicon.png')) ?>" rel="apple-touch-icon"/>

    <!-- Fonts & Core Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&amp;display=swap" rel="stylesheet"/>
    <link href="<?= asset('assets/css/style.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/swiper.BVTPDLrX.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/Navbar.B5rJp8D8.css') ?>" rel="stylesheet"/>
    <link href="<?= asset('assets/css/free-mode.BlRuW1W2.css') ?>" rel="stylesheet"/>

    <!-- Structured Data (Schema.org JSON-LD for Google Rich Results) -->
    <?= \App\Core\Seo::renderSchemaJsonLd($seoMeta ?? []) ?>

    <style>
        #home-news-swiper .swiper-slide {
            height: auto !important;
            display: flex !important;
        }
        #home-news-swiper .swiper-slide article {
            width: 100% !important;
        }
    </style>
</head>
<body>
    <div id="__nuxt">
        <div id="site-root">
            <div class="relative overflow-x-hidden">
                <!-- Topbar -->
                <?php \App\Core\View::partial('partials/topbar'); ?>

                <!-- Header Navbar -->
                <?php \App\Core\View::partial('partials/header'); ?>

                <!-- Main Content -->
                <main>
                    <?= $content ?>
                    <?php \App\Core\View::partial('partials/floating_social'); ?>
                </main>

                <!-- Footer -->
                <?php \App\Core\View::partial('partials/footer'); ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= asset('assets/js/swiper-bundle.min.js') ?>"></script>
    <script src="<?= asset('assets/js/i18n.js') ?>"></script>
    <script src="<?= asset('assets/js/main.js') ?>"></script>
</body>
</html>
