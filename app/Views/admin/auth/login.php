<?php
/** @var bool $isLocked */
/** @var int $retryAfter */
/** @var int $remainingAttempts */
$lockMinutes = max(1, (int)ceil($retryAfter / 60));
?>
<!DOCTYPE html>
<html lang="tr" class="h-full bg-[#050811]">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <!-- STRICT NOINDEX: GOOGLE & SEARCH ENGINES BLOCKED -->
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, notranslate"/>
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex"/>

    <title>Giriş Yap - Seyitler Kimya Yönetim Portalı</title>
    <link href="<?= asset(\App\Models\SiteSetting::get('site_favicon', 'assets/images/favicon.png')) ?>" rel="icon"/>

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#10b981',
                            600: '#0AA64D',
                            700: '#047857',
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
</head>
<body class="h-full flex items-center justify-center p-4 antialiased bg-[#050811] relative overflow-hidden font-sans selection:bg-emerald-500 selection:text-white">
    
    <!-- Enterprise Ambient Mesh Glows -->
    <div class="absolute -top-32 -left-32 size-[500px] rounded-full bg-emerald-600/15 blur-[140px] pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 size-[500px] rounded-full bg-teal-500/15 blur-[140px] pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 size-[600px] rounded-full bg-brand-600/5 blur-[180px] pointer-events-none"></div>

    <!-- Central Glassmorphism Card -->
    <div class="w-full max-w-md bg-white/[0.03] backdrop-blur-2xl rounded-3xl shadow-2xl p-8 sm:p-10 border border-white/10 relative z-10">
        
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="size-16 rounded-2xl bg-gradient-to-tr from-brand-600 via-emerald-500 to-teal-400 p-0.5 shadow-xl shadow-brand-600/30 mx-auto mb-4 flex items-center justify-center">
                <div class="size-full bg-[#070A12] rounded-[14px] flex items-center justify-center p-2.5">
                    <img src="<?= asset('assets/images/seyitler_yatay_logo.png') ?>" alt="Seyitler Kimya" class="size-full object-contain brightness-0 invert"/>
                </div>
            </div>
            <h1 class="text-2xl font-display font-extrabold text-white tracking-wide">Yönetim Portalı</h1>
            <p class="text-xs text-slate-400 mt-1 font-medium">Seyitler Kimya Sanayi A.Ş. &bull; Executive Access</p>
            
            <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-[10px] font-semibold text-emerald-400">
                <span class="size-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Uçtan Uca Şifreli Güvenli Bağlantı</span>
            </div>
        </div>

        <!-- Lockout Banner (If Bruteforce Lock is Active) -->
        <?php if (!empty($isLocked)): ?>
            <div class="mb-6 p-4 rounded-2xl bg-rose-500/15 border border-rose-500/40 text-rose-300 text-xs font-semibold flex items-start gap-3">
                <svg class="size-5 text-rose-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                <div>
                    <div class="font-bold text-rose-200">Girişler Geçici Olarak Kilitlendi</div>
                    <div class="text-[11px] text-rose-300/90 mt-1">
                        Çok fazla başarısız deneme yapıldığı için sistem güvenliği gereğince yaklaşık <strong class="text-white"><?= $lockMinutes ?> dakika</strong> süreyle giriş yapılamaz.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Warning on Limited Attempts Left -->
        <?php if (empty($isLocked) && isset($remainingAttempts) && $remainingAttempts < 5): ?>
            <div class="mb-6 p-3.5 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-semibold flex items-center gap-2.5">
                <svg class="size-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                <span>Kalan giriş deneme hakkınız: <strong class="text-white font-bold"><?= $remainingAttempts ?> / 5</strong></span>
            </div>
        <?php endif; ?>

        <!-- Flash Messages -->
        <?php if (has_flash('error')): ?>
            <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-semibold flex items-center gap-3">
                <svg class="size-5 text-rose-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z"/></svg>
                <span><?= e(flash('error')) ?></span>
            </div>
        <?php endif; ?>

        <?php if (has_flash('success')): ?>
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold flex items-center gap-3">
                <svg class="size-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <span><?= e(flash('success')) ?></span>
            </div>
        <?php endif; ?>

        <!-- Executive Login Form -->
        <form action="<?= url('/podmin/login') ?>" method="POST" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1.5">Yönetici Adı veya E-posta</label>
                <div class="relative">
                    <input type="text" name="username" required autofocus placeholder="admin" <?= !empty($isLocked) ? 'disabled' : '' ?> class="w-full pl-10 pr-4 py-3 text-sm rounded-xl bg-white/5 border border-white/10 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all font-medium text-white placeholder:text-slate-500 disabled:opacity-40 disabled:cursor-not-allowed"/>
                    <svg class="size-5 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1.5">Giriş Şifresi</label>
                <div class="relative">
                    <input type="password" id="login_password" name="password" required placeholder="••••••••" <?= !empty($isLocked) ? 'disabled' : '' ?> class="w-full pl-10 pr-11 py-3 text-sm rounded-xl bg-white/5 border border-white/10 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all font-medium text-white placeholder:text-slate-500 disabled:opacity-40 disabled:cursor-not-allowed"/>
                    <svg class="size-5 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                    <button type="button" onclick="togglePassVisibility()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white transition-colors p-1" title="Şifreyi Göster/Gizle">
                        <svg id="eye-icon" class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    </button>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" <?= !empty($isLocked) ? 'disabled' : '' ?> class="w-full py-3.5 px-6 bg-gradient-to-r from-emerald-500 via-brand-600 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all hover:scale-[1.02] active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                    <span>Güvenli Oturum Başlat</span>
                </button>
            </div>
        </form>

        <div class="mt-8 text-center border-t border-white/5 pt-6">
            <a href="<?= url('/') ?>" class="text-xs font-semibold text-slate-400 hover:text-emerald-400 transition-colors inline-flex items-center gap-2">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                <span>Kurumsal Ana Sayfaya Dön</span>
            </a>
        </div>

    </div>

    <script>
        function togglePassVisibility() {
            const passInput = document.getElementById('login_password');
            const eyeIcon = document.getElementById('eye-icon');
            if (!passInput) return;

            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.classList.add('text-emerald-400');
            } else {
                passInput.type = 'password';
                eyeIcon.classList.remove('text-emerald-400');
            }
        }
    </script>
</body>
</html>
