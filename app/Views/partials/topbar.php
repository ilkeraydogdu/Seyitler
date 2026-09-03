<?php
$currentLang = current_locale();
$langLabels = [
    'tr' => 'Türkçe',
    'en' => 'English',
    'ar' => 'عربي',
];
$address   = site_setting('address', 'SELVİLİTEPE OSB MAH. OSB 2007. CAD. SEYITLER KIMYA SAN.A.Ş NO: 7 İÇ KAPI NO: 2 TURGUTLU / MANİSA');
$phone     = site_setting('phone', '+90 236 314 83 83');
$email     = site_setting('email', 'seyitler@seyitler.com');
$linkedin  = site_setting('linkedin_url', 'https://www.linkedin.com/company/seyitler-kimya');
$instagram = site_setting('instagram_url', 'https://www.instagram.com/seyitlerkimya/');

// Mevcut URL'i koruyup sadece lang parametresini değiştirme
$currentQuery = $_GET;
function lang_url(string $lang): string {
    global $currentQuery;
    $q = $currentQuery;
    $q['lang'] = $lang;
    return '?' . http_build_query($q);
}
?>
<div class="bg-[#F8F8F8] w-full top-bar-container border-b border-gray-100">
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 text-xs font-light items-center text-[#888] hidden sm:flex justify-between">
        <div class="flex gap-6 grow overflow-hidden">
            <div class="flex items-center gap-1.5 truncate">
                <svg class="lucide size-3.5 text-[#0AA64D] shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span class="truncate"><?= e($address) ?></span>
            </div>
            <div class="flex items-center gap-1.5 shrink-0">
                <svg class="lucide size-3.5 text-[#0AA64D] shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <rect height="20" rx="2" ry="2" width="14" x="5" y="2"></rect>
                    <path d="M12 18h.01"></path>
                </svg>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $phone) ?>" class="hover:text-[#0AA64D] transition-colors"><?= e($phone) ?></a>
            </div>
            <div class="flex items-center gap-1.5 shrink-0">
                <svg class="lucide size-3.5 text-[#0AA64D] shrink-0" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <rect height="16" rx="2" width="20" x="2" y="4"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
                <a href="mailto:<?= e($email) ?>" class="hover:text-[#0AA64D] transition-colors"><?= e($email) ?></a>
            </div>
        </div>

        <div class="flex gap-4 items-center shrink-0">
            <div class="flex gap-2.5 items-center">
                <?php if (!empty($linkedin)): ?>
                    <a href="<?= e($linkedin) ?>" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-[#0AA64D] transition-colors" title="LinkedIn">
                        <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($instagram)): ?>
                    <a href="<?= e($instagram) ?>" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-[#0AA64D] transition-colors" title="Instagram">
                        <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Language Switcher Dropdown -->
            <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                <button type="button" class="flex items-center gap-1.5 text-xs text-gray-600 hover:text-[#0AA64D] transition-colors py-1 cursor-pointer select-none font-medium" id="lang-switch-btn">
                    <svg class="size-4 text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <span><?= $langLabels[$currentLang] ?? 'Türkçe' ?></span>
                    <svg class="size-3 text-gray-400 transition-transform duration-200" id="lang-chevron" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><path d="m6 9 6 6 6-6"></path></svg>
                </button>
                <div id="lang-dropdown-menu" class="absolute right-0 top-full pt-1.5 z-[9999] hidden">
                    <div class="w-32 bg-white rounded-xl shadow-xl border border-gray-100 py-1 divide-y divide-gray-50 text-center">
                        <?php foreach ($langLabels as $code => $label): ?>
                            <?php if ($code !== $currentLang): ?>
                                <a href="<?= lang_url($code) ?>" class="block w-full py-2 px-3 text-xs font-medium text-gray-700 hover:text-[#0AA64D] hover:bg-gray-50 transition-colors">
                                    <?= $label ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('lang-switch-btn');
    const menu = document.getElementById('lang-dropdown-menu');
    const chevron = document.getElementById('lang-chevron');
    if (!btn || !menu) return;

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            if (chevron) chevron.classList.add('rotate-180');
        } else {
            menu.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        }
    });

    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            menu.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        }
    });
});
</script>
