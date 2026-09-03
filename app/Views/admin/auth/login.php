<?php
/** @var bool $isLocked */
/** @var int $retryAfter */
/** @var int $remainingAttempts */
$lockMinutes = max(1, (int)ceil($retryAfter / 60));
$siteLogo = \App\Models\SiteSetting::get('site_logo', 'assets/images/seyitler_yatay_logo.png');
$siteFavicon = \App\Models\SiteSetting::get('site_favicon', 'assets/images/favicon.png');
?>
<!DOCTYPE html>
<html lang="tr" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <!-- STRICT NOINDEX: GOOGLE & SEARCH ENGINES BLOCKED -->
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, notranslate"/>
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex"/>

    <title>Giriş Yap - Seyitler Kimya Yönetim Portalı</title>
    <link href="<?= asset($siteFavicon) ?>" rel="icon"/>

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
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
                            500: '#10b981',
                            600: '#0AA64D',
                            700: '#047857',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 25px -4px rgba(0, 0, 0, 0.05), 0 2px 8px -2px rgba(0, 0, 0, 0.02)',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="h-full flex items-center justify-center p-4 antialiased bg-[#F8FAFC] font-sans selection:bg-brand-600 selection:text-white">
    
    <!-- Central Clean White Card -->
    <div class="w-full max-w-md bg-white rounded-3xl shadow-soft p-8 sm:p-10 border border-slate-200/80 relative z-10">
        
        <!-- Brand Header -->
        <div class="text-center mb-7">
            <a href="<?= url('/') ?>" class="inline-block group mb-4">
                <div class="h-14 px-4 py-2 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-center justify-center mx-auto transition-transform group-hover:scale-105">
                    <img src="<?= asset($siteLogo) ?>" alt="Seyitler Kimya Logo" class="max-h-full max-w-full object-contain"/>
                </div>
            </a>
            
            <h1 class="text-xl font-bold font-display text-slate-900 tracking-tight">Yönetim Portalı</h1>
            <p class="text-xs text-slate-500 mt-1">Devam etmek için yönetici kimliğinizi doğrulayın.</p>
        </div>

        <!-- Lockout Notice -->
        <?php if ($isLocked): ?>
            <div class="mb-6 p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-start gap-3">
                <svg class="size-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                <div>
                    <div class="font-bold text-amber-950">Giriş Geçici Olarak Kilitlendi</div>
                    <div class="text-[11px] text-amber-800 mt-0.5">Çok sayıda hatalı deneme nedeniyle panel <?= $lockMinutes ?> dakika boyunca güvenli kilit modundadır.</div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Alerts Center -->
        <?php if (has_flash('error')): ?>
            <div class="mb-6 p-3.5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3">
                <div class="size-6 rounded-lg bg-rose-600 text-white flex items-center justify-center shrink-0">
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </div>
                <span><?= e(flash('error')) ?></span>
            </div>
        <?php endif; ?>

        <?php if (has_flash('success')): ?>
            <div class="mb-6 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-3">
                <div class="size-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0">
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                </div>
                <span><?= e(flash('success')) ?></span>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= url('/podmin/login') ?>" method="POST" class="space-y-4" <?= $isLocked ? 'onsubmit="return false;"' : '' ?>>
            <?= csrf_field() ?>

            <div>
                <label for="username" class="block text-xs font-semibold text-slate-700 mb-1.5">Kullanıcı Adı</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    </div>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        autocomplete="username" 
                        placeholder="Yönetici kullanıcı adı"
                        <?= $isLocked ? 'disabled' : '' ?>
                        class="w-full pl-10 pr-4 py-2.5 text-xs rounded-xl bg-slate-50/70 border border-slate-200 text-slate-900 placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                    />
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 mb-1.5">Güvenlik Şifresi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                    </div>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                        placeholder="••••••••••••"
                        <?= $isLocked ? 'disabled' : '' ?>
                        class="w-full pl-10 pr-10 py-2.5 text-xs rounded-xl bg-slate-50/70 border border-slate-200 text-slate-900 placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                    />
                    <button type="button" onclick="togglePassLogin()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors" tabindex="-1">
                        <svg id="eye-icon" class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    </button>
                </div>
            </div>

            <div class="pt-2">
                <button 
                    type="submit" 
                    <?= $isLocked ? 'disabled' : '' ?>
                    class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl shadow-xs transition-all flex items-center justify-center gap-2 cursor-pointer <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/></svg>
                    <span>Oturum Aç</span>
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
            <span class="flex items-center gap-1.5">
                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                <span>Güvenli Bağlantı</span>
            </span>
            <a href="<?= url('/') ?>" class="hover:text-emerald-700 transition-colors">Ana Sayfaya Dön &rarr;</a>
        </div>

    </div>

    <script>
        function togglePassLogin() {
            const input = document.getElementById('password');
            if (!input) return;
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
