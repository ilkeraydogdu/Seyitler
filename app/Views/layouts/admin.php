<?php
use App\Core\Auth;
use App\Models\ContactMessage;

$unreadCount = ContactMessage::unreadCount();
$user = Auth::user();
?>
<!DOCTYPE html>
<html lang="tr" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?= e($pageTitle ?? 'Yönetim Paneli - Seyitler Kimya') ?></title>
    <link href="<?= asset('favicon.png') ?>" rel="icon"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
                            500: '#10b981',
                            600: '#0AA64D',
                            700: '#047857',
                            900: '#064e3b',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full flex flex-col antialiased text-slate-800">
    <div class="flex h-full min-h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside id="admin-sidebar" class="w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0 transition-transform duration-200 z-50 fixed inset-y-0 left-0 lg:static lg:translate-x-0 -translate-x-full">
            <!-- Brand Logo -->
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
                <a href="<?= url('/admin') ?>" class="flex items-center gap-3">
                    <img src="<?= asset('assets/images/logo.png') ?>" alt="Logo" class="size-8 object-contain brightness-0 invert"/>
                    <div class="flex flex-col">
                        <span class="text-white font-bold text-base tracking-wide leading-none">SEYİTLER</span>
                        <span class="text-[10px] font-semibold text-brand-500 uppercase tracking-widest mt-1">Yönetim Paneli</span>
                    </div>
                </a>
                <button id="sidebar-close-btn" class="lg:hidden text-slate-400 hover:text-white" type="button">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5 text-xs font-semibold">
                <a href="<?= url('/admin') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    <span>Genel Bakış</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-500">Katalog Yönetimi</div>

                <a href="<?= url('/admin/products') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/products') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
                    <span>Ürünler</span>
                </a>

                <a href="<?= url('/admin/categories') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/categories') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    <span>Kategoriler</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-500">Kurumsal & İçerik</div>

                <a href="<?= url('/admin/investors') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/investors') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    <span>Yatırımcı İlişkileri</span>
                </a>

                <a href="<?= url('/admin/news') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/news') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/></svg>
                    <span>Haberler & Fuarlar</span>
                </a>

                <a href="<?= url('/admin/messages') ?>" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/messages') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <div class="flex items-center gap-3">
                        <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        <span>Gelen Mesajlar</span>
                    </div>
                    <?php if ($unreadCount > 0): ?>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-rose-500 text-white shrink-0"><?= $unreadCount ?></span>
                    <?php endif; ?>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-500">Sistem</div>

                <a href="<?= url('/admin/translations') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/translations') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/></svg>
                    <span>Çeviriler & Diller</span>
                </a>

                <a href="<?= url('/admin/settings') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= is_active_route('/admin/settings') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'hover:bg-slate-800 hover:text-white text-slate-400' ?>">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    <span>Site Ayarları</span>
                </a>
            </nav>

            <!-- User Footer -->
            <div class="p-4 border-t border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="size-9 rounded-full bg-brand-600 text-white font-bold flex items-center justify-center shrink-0">
                        <?= strtoupper(substr($user['username'] ?? 'A', 0, 1)) ?>
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-bold text-white truncate"><?= e($user['username'] ?? 'Admin') ?></div>
                        <div class="text-[10px] text-slate-500 truncate"><?= e($user['email'] ?? 'admin@seyitler.com') ?></div>
                    </div>
                </div>
                <a href="<?= url('/admin/logout') ?>" class="p-2 text-slate-400 hover:text-rose-400 transition-colors" title="Çıkış Yap">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/></svg>
                </a>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Top Navbar -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 shrink-0 sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <button id="sidebar-open-btn" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100" type="button">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    </button>
                    <h1 class="text-lg font-bold text-slate-900"><?= e($pageTitle ?? 'Yönetim Paneli') ?></h1>
                </div>

                <div class="flex items-center gap-4">
                    <a href="<?= url('/') ?>" target="_blank" class="inline-flex items-center gap-2 px-3.5 py-2 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                        <svg class="size-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        <span>Siteyi Görüntüle</span>
                    </a>
                </div>
            </header>

            <!-- Flash Messages -->
            <?php if (has_flash('success')): ?>
                <div class="p-4 mx-6 mt-6 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-3">
                    <svg class="size-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    <span><?= e(flash('success')) ?></span>
                </div>
            <?php endif; ?>

            <?php if (has_flash('error')): ?>
                <div class="p-4 mx-6 mt-6 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3">
                    <svg class="size-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z"/></svg>
                    <span><?= e(flash('error')) ?></span>
                </div>
            <?php endif; ?>

            <!-- Page Body -->
            <main class="p-6 flex-1">
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
