<?php
use App\Core\Auth;
use App\Models\ContactMessage;
use App\Models\SiteSetting;

$unreadCount = ContactMessage::unreadCount();
$user = Auth::user();
$siteLogo = SiteSetting::get('site_logo', 'assets/images/seyitler_yatay_logo.png');
$siteFavicon = SiteSetting::get('site_favicon', 'assets/images/favicon.png');
?>
<!DOCTYPE html>
<html lang="tr" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <!-- STRICT ROBOTS META: NEVER ALLOW SEARCH ENGINES TO INDEX PODMIN -->
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, notranslate"/>
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex"/>

    <title><?= e($pageTitle ?? 'Yönetim Paneli - Seyitler Kimya Sanayi A.Ş.') ?></title>
    <link href="<?= asset($siteFavicon) ?>" rel="icon"/>

    <!-- Google Fonts: Plus Jakarta Sans & Outfit (Clean, Modern, Corporate) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN for Admin UI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#0AA64D',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 2px 10px -2px rgba(0, 0, 0, 0.04), 0 1px 4px -1px rgba(0, 0, 0, 0.02)',
                        'card': '0 4px 20px -4px rgba(0, 0, 0, 0.05), 0 2px 6px -2px rgba(0, 0, 0, 0.02)',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }
        
        /* Soft modern scrollbars */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</head>
<body class="h-full flex flex-col antialiased text-slate-800 bg-[#F8FAFC] selection:bg-brand-600 selection:text-white">
    <div class="flex h-full min-h-screen overflow-hidden">
        
        <!-- ============================================================== -->
        <!-- CLEAN, LIGHT ENTERPRISE SIDEBAR -->
        <!-- ============================================================== -->
        <aside id="admin-sidebar" class="w-68 bg-white border-r border-slate-200/80 flex flex-col shrink-0 transition-transform duration-300 z-50 fixed inset-y-0 left-0 lg:static lg:translate-x-0 -translate-x-full shadow-sm">
            
            <!-- Brand Portal Header -->
            <div class="h-18 flex items-center justify-between px-5 border-b border-slate-100">
                <a href="<?= url('/podmin') ?>" class="flex items-center gap-3 group">
                    <div class="size-10 rounded-xl bg-emerald-50 border border-emerald-100/80 p-1.5 flex items-center justify-center shrink-0 group-hover:scale-105 transition-all">
                        <img src="<?= asset($siteLogo) ?>" alt="Seyitler Logo" class="max-h-full max-w-full object-contain"/>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-900 font-display font-extrabold text-sm tracking-wide leading-none">SEYİTLER</span>
                            <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200/50 uppercase tracking-wider">CMS</span>
                        </div>
                        <span class="text-[10px] font-medium text-slate-400 mt-0.5 flex items-center gap-1.5">
                            <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Yönetim Portalı
                        </span>
                    </div>
                </a>
                <button id="sidebar-close-btn" class="lg:hidden text-slate-400 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-100 transition-colors" type="button" aria-label="Menüyü Kapat">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-3.5 py-4 space-y-1 text-xs">
                
                <!-- Main Overview -->
                <?php $isDash = is_active_route('/podmin') && !is_active_route('/podmin/products') && !is_active_route('/podmin/categories') && !is_active_route('/podmin/pages') && !is_active_route('/podmin/investors') && !is_active_route('/podmin/news') && !is_active_route('/podmin/messages') && !is_active_route('/podmin/translations') && !is_active_route('/podmin/settings'); ?>
                <a href="<?= url('/podmin') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= $isDash ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    <span>Genel Bakış</span>
                </a>

                <!-- SECTION: ÜRÜN YÖNETİMİ -->
                <div class="pt-4 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                    Ürün & Katalog
                </div>

                <a href="<?= url('/podmin/products') ?>" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/products') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <div class="flex items-center gap-3">
                        <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                        <span>Ürünler & Tablolar</span>
                    </div>
                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-slate-100 text-slate-600">18 Ürün</span>
                </a>

                <a href="<?= url('/podmin/categories') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/categories') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    <span>Kategoriler</span>
                </a>

                <!-- SECTION: KURUMSAL İÇERİK -->
                <div class="pt-4 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                    Kurumsal & Doküman
                </div>

                <a href="<?= url('/podmin/investors') ?>" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/investors') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <div class="flex items-center gap-3">
                        <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                        <span>Yatırımcı Belgeleri</span>
                    </div>
                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200/40">149 PDF</span>
                </a>

                <a href="<?= url('/podmin/pages') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/pages') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg>
                    <span>Sayfalar & İçerikler</span>
                </a>

                <a href="<?= url('/podmin/news') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/news') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/></svg>
                    <span>Haberler & Duyurular</span>
                </a>

                <a href="<?= url('/podmin/messages') ?>" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/messages') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <div class="flex items-center gap-3">
                        <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        <span>İletişim Mesajları</span>
                    </div>
                    <?php if ($unreadCount > 0): ?>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-rose-500 text-white shrink-0"><?= $unreadCount ?> yeni</span>
                    <?php endif; ?>
                </a>

                <!-- SECTION: AYARLAR & SİSTEM -->
                <div class="pt-4 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                    Sistem & Ayarlar
                </div>

                <a href="<?= url('/podmin/translations') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/translations') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/></svg>
                    <span>Dil & Çeviriler</span>
                </a>

                <a href="<?= url('/podmin/settings') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-medium <?= is_active_route('/podmin/settings') ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/60 shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/50' ?>">
                    <svg class="size-4.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    <span>Site & Güvenlik</span>
                </a>
            </nav>

            <!-- User Session Footer -->
            <div class="p-3.5 border-t border-slate-100 bg-slate-50/60 flex items-center justify-between">
                <a href="<?= url('/podmin/settings') ?>" class="flex items-center gap-2.5 overflow-hidden group">
                    <div class="size-8.5 rounded-xl bg-emerald-600 text-white font-bold text-xs flex items-center justify-center shrink-0 shadow-xs">
                        <?= strtoupper(substr($user['username'] ?? 'A', 0, 1)) ?>
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-semibold text-slate-800 group-hover:text-emerald-700 transition-colors truncate"><?= e($user['username'] ?? 'Admin') ?></div>
                        <div class="text-[10px] text-slate-400">Yönetici</div>
                    </div>
                </a>
                <a href="<?= url('/podmin/logout') ?>" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="Güvenli Çıkış Yap">
                    <svg class="size-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/></svg>
                </a>
            </div>
        </aside>

        <!-- ============================================================== -->
        <!-- MAIN ENTERPRISE VIEWPORT -->
        <!-- ============================================================== -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            
            <!-- Clean Soft Top Navbar -->
            <header class="h-18 bg-white/90 backdrop-blur-md border-b border-slate-200/70 flex items-center justify-between px-6 lg:px-8 shrink-0 sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <button id="sidebar-open-btn" class="lg:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors" type="button" aria-label="Menüyü Aç">
                        <svg class="size-5.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold font-display text-slate-900 leading-tight">
                            <?= e($pageTitle ?? 'Yönetim Paneli') ?>
                        </h1>
                        <div class="text-[11px] text-slate-400 font-medium flex items-center gap-2 mt-0.5">
                            <span>Seyitler Kimya Sanayi A.Ş.</span>
                            <span>&bull;</span>
                            <span class="text-emerald-700 font-medium">Güvenli Oturum</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2.5">
                    <!-- Live Website Button with Soft Badge -->
                    <a href="<?= url('/') ?>" target="_blank" class="inline-flex items-center gap-2 px-3.5 py-2 text-xs font-semibold text-emerald-800 bg-emerald-50 hover:bg-emerald-100/70 border border-emerald-200/60 rounded-xl transition-all">
                        <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <svg class="size-3.5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        <span class="hidden sm:inline">Siteyi Gör</span>
                    </a>
                </div>
            </header>

            <!-- Alerts Notification Center -->
            <?php if (has_flash('success')): ?>
                <div class="mx-6 lg:mx-8 mt-5 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-3">
                    <div class="size-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    </div>
                    <span><?= e(flash('success')) ?></span>
                </div>
            <?php endif; ?>

            <?php if (has_flash('error')): ?>
                <div class="mx-6 lg:mx-8 mt-5 p-3.5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3">
                    <div class="size-7 rounded-lg bg-rose-600 text-white flex items-center justify-center shrink-0">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z"/></svg>
                    </div>
                    <span><?= e(flash('error')) ?></span>
                </div>
            <?php endif; ?>

            <!-- Page Body Content Viewport -->
            <main class="p-6 sm:p-8 flex-1">
                <?= $content ?>
            </main>
        </div>

    </div>

    <script>
        const sidebar = document.getElementById('admin-sidebar');
        const openBtn = document.getElementById('sidebar-open-btn');
        const closeBtn = document.getElementById('sidebar-close-btn');

        if (openBtn && sidebar) {
            openBtn.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
            });
        }
        if (closeBtn && sidebar) {
            closeBtn.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
            });
        }
    </script>
</body>
</html>
