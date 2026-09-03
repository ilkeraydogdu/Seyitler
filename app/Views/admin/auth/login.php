<?php
/** @var bool $isLocked */
/** @var int $retryAfter */
/** @var int $remainingAttempts */
$lockMinutes = max(1, (int)ceil($retryAfter / 60));
$siteLogo = \App\Models\SiteSetting::get('site_logo', 'assets/images/seyitler_yatay_logo.png');
$siteFavicon = \App\Models\SiteSetting::get('site_favicon', 'assets/images/favicon.png');
?>
<!DOCTYPE html>
<html lang="tr" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <!-- STRICT NOINDEX: GOOGLE & SEARCH ENGINES BLOCKED -->
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, notranslate"/>
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex"/>

    <title>Yönetici Girişi - Seyitler Kimya</title>
    <link href="<?= asset($siteFavicon) ?>" rel="icon"/>

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Enterprise Console Shield & Warning Suppressor -->
    <script>
        (function() {
            const originalWarn = console.warn;
            console.warn = function(...args) {
                if (args[0] && typeof args[0] === 'string' && args[0].includes('cdn.tailwindcss.com')) {
                    return;
                }
                originalWarn.apply(console, args);
            };
        })();
    </script>

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
                            500: '#10b981',
                            600: '#0AA64D',
                            700: '#088a3f',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
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
<body class="min-h-full flex flex-col items-center justify-center p-4 sm:p-6 antialiased bg-[#090d16] font-sans selection:bg-brand-600 selection:text-white relative overflow-x-hidden">
    
    <!-- Ambient Lighting Glows for Dark Depth -->
    <div class="fixed top-0 left-1/4 -translate-x-1/2 -translate-y-1/2 size-96 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-0 right-1/4 translate-x-1/2 translate-y-1/2 size-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-[440px] my-auto relative z-10">
        
        <!-- Central Card -->
        <div class="bg-white rounded-3xl shadow-2xl shadow-black/60 p-7 sm:p-10 border border-slate-200/90 relative">
            
            <!-- Brand Header -->
            <div class="text-center mb-8">
                <a href="<?= url('/') ?>" class="inline-block group mb-5">
                    <div class="h-16 px-5 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-center mx-auto transition-transform group-hover:scale-105">
                        <img src="<?= asset($siteLogo) ?>" alt="Seyitler Kimya Logo" class="max-h-full max-w-full object-contain"/>
                    </div>
                </a>
                
                <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Yönetici Portalı</h1>
                <p class="text-sm text-slate-500 mt-1.5">Devam etmek için kullanıcı adı veya e-postanızla giriş yapın.</p>
            </div>

            <!-- Lockout Notice -->
            <?php if ($isLocked): ?>
                <div class="mb-6 p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-sm flex items-start gap-3">
                    <svg class="size-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                    <div>
                        <div class="font-bold text-amber-950">Giriş Geçici Olarak Kilitlendi</div>
                        <div class="text-xs text-amber-800 mt-0.5">Çok sayıda hatalı deneme nedeniyle panel <?= $lockMinutes ?> dakika boyunca güvenli kilit modundadır.</div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Alerts Center -->
            <?php if (has_flash('error')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm font-semibold flex items-center gap-3">
                    <div class="size-7 rounded-lg bg-rose-600 text-white flex items-center justify-center shrink-0">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <span><?= e(flash('error')) ?></span>
                </div>
            <?php endif; ?>

            <?php if (has_flash('success')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold flex items-center gap-3">
                    <div class="size-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    </div>
                    <span><?= e(flash('success')) ?></span>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?= url('/podmin/login') ?>" method="POST" class="space-y-5" <?= $isLocked ? 'onsubmit="return false;"' : '' ?>>
                <?= csrf_field() ?>

                <!-- Unified Identifier Input (Username or Email) -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-slate-700 mb-1.5">Kullanıcı Adı veya E-posta</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                        </div>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            required 
                            autocomplete="username" 
                            placeholder="admin veya admin@seyitler.com"
                            <?= $isLocked ? 'disabled' : '' ?>
                            class="w-full pl-11 pr-4 py-3 text-sm rounded-xl bg-slate-50/80 border border-slate-200 text-slate-900 placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                        />
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Şifre</label>
                        <span class="text-xs text-slate-400">En az 6 karakter</span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="••••••••••••"
                            <?= $isLocked ? 'disabled' : '' ?>
                            class="w-full pl-11 pr-11 py-3 text-sm rounded-xl bg-slate-50/80 border border-slate-200 text-slate-900 placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                        />
                        <button type="button" onclick="togglePassLogin()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors" tabindex="-1">
                            <svg id="eye-icon" class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button 
                        type="submit" 
                        <?= $isLocked ? 'disabled' : '' ?>
                        class="w-full py-3.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-emerald-600/20 transition-all flex items-center justify-center gap-2 cursor-pointer active:scale-[0.99] <?= $isLocked ? 'opacity-50 cursor-not-allowed' : '' ?>"
                    >
                        <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/></svg>
                        <span>Yönetici Paneline Giriş Yap</span>
                    </button>
                </div>
            </form>

            <!-- Card Bottom Info -->
            <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                <span class="flex items-center gap-1.5">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    <span>256-Bit SSL Korumalı</span>
                </span>
                <a href="<?= url('/') ?>" class="font-medium hover:text-emerald-700 transition-colors flex items-center gap-1">
                    <span>Web Sitesine Dön</span>
                    <span>&rarr;</span>
                </a>
            </div>

        </div>

        <!-- Custom Admin Footer Mascot/Logo (adminfooter.png) -->
        <div class="mt-8 text-center flex flex-col items-center justify-center gap-2">
            <a href="https://kasabaworks.com" target="_blank" rel="noopener noreferrer" class="inline-block transition-transform hover:scale-105">
                <img 
                    src="<?= asset('assets/images/adminfooter.png') ?>" 
                    alt="Kasaba Works" 
                    class="h-12 sm:h-14 w-auto object-contain drop-shadow-md"
                />
            </a>
            <div class="text-xs text-slate-400 font-medium tracking-wide">
                Powered by <a href="https://kasabaworks.com" target="_blank" rel="noopener noreferrer" class="text-white hover:text-emerald-400 font-semibold transition-colors">Kasaba Works</a>
            </div>
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
