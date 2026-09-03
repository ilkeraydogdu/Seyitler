<?php
use App\Models\SiteSetting;

/** @var array $currentUser */
$siteLogo = SiteSetting::get('site_logo', 'assets/images/seyitler_yatay_logo.png');
$siteLogoNeg = SiteSetting::get('site_logo_negative', 'assets/images/seyitler_yatay_logo_NEGATIF.png');
$siteFavicon = SiteSetting::get('site_favicon', 'assets/images/favicon.png');
$siteTitle = SiteSetting::get('site_title', 'Seyitler Kimya - Sağlık Üretiyoruz');
$siteDesc = SiteSetting::get('site_description', 'Seyitler Kimya Sanayi A.Ş. - 1991 yılından bu yana sağlık sektöründe güvenilir medikal plaster üreticisi.');
?>

<div class="space-y-8 max-w-6xl mx-auto pb-16">
    
    <!-- Header with Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Merkezi Sistem & Kimlik Yönetimi</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold font-display text-slate-900 tracking-tight">Sistem, Marka & Güvenlik Ayarları</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Logo, favicon, yönetici şifresi, fabrika iletişim kanalları, videolar, sayaçlar ve SEO kodlarını buradan yönetin.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="<?= url('/') ?>" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl shadow-xs transition-all hover:text-emerald-700">
                <svg class="size-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                <span>Canlı Siteyi Önizle</span>
            </a>
        </div>
    </div>

    <!-- Navigation Tabs (Sleek Modern Soft Tab Bar) -->
    <div class="bg-white p-1.5 rounded-2xl border border-slate-200/80 shadow-soft flex flex-wrap gap-1 sticky top-20 z-30">
        <button type="button" onclick="switchSettingTab('branding')" id="btn-tab-branding" class="tab-btn px-3.5 py-2 text-xs font-semibold rounded-xl transition-all flex items-center gap-2 bg-emerald-50 text-emerald-800 border border-emerald-200/60 shadow-xs">
            <svg class="size-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"/></svg>
            <span>Logo & Favicon</span>
        </button>

        <button type="button" onclick="switchSettingTab('security')" id="btn-tab-security" class="tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
            <svg class="size-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
            <span>Admin Şifresi & Güvenlik</span>
        </button>

        <button type="button" onclick="switchSettingTab('contact')" id="btn-tab-contact" class="tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
            <svg class="size-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/></svg>
            <span>Fabrika & İletişim</span>
        </button>

        <button type="button" onclick="switchSettingTab('media')" id="btn-tab-media" class="tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
            <svg class="size-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
            <span>Video & Medya</span>
        </button>

        <button type="button" onclick="switchSettingTab('stats')" id="btn-tab-stats" class="tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
            <svg class="size-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
            <span>Sayaçlar & Linkler</span>
        </button>

        <button type="button" onclick="switchSettingTab('social')" id="btn-tab-social" class="tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
            <svg class="size-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-.778.099-1.533.284-2.253"/></svg>
            <span>Sosyal Medya & SEO</span>
        </button>
    </div>

    <!-- MAIN FORM FOR SITE SETTINGS -->
    <form method="POST" action="<?= url('/podmin/settings/update') ?>" enctype="multipart/form-data" id="settings-form" class="space-y-8">
        <?= csrf_field() ?>

        <!-- ============================================================ -->
        <!-- TAB 1: BRANDING (LOGO & FAVICON) -->
        <!-- ============================================================ -->
        <div id="tab-branding" class="space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-8">
                <div class="pb-4 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Kurumsal Marka Varlıkları & Logolar</h3>
                        <p class="text-xs text-slate-400">Üst navigasyonda, altbilgide ve tarayıcı sekmesinde sergilenen resmi logolar</p>
                    </div>
                </div>

                <!-- Brand Assets Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <!-- 1. Primary Header Logo -->
                    <div class="p-5 rounded-2xl border border-slate-200/80 bg-slate-50/40 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-slate-800 uppercase tracking-wide">Ana Header Logosu</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Açık Zemin</span>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Beyaz zeminlerde ve ana menüde kullanılır.</p>
                            
                            <!-- Preview Box -->
                            <div class="w-full h-24 rounded-xl border border-dashed border-slate-300 bg-white flex items-center justify-center p-3 shadow-2xs">
                                <img id="preview-site-logo" src="<?= asset($siteLogo) ?>" alt="Site Logosu" class="max-h-full max-w-full object-contain"/>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2">
                            <label class="block text-xs font-bold text-slate-700">Yeni Logo Dosyası</label>
                            <input type="file" name="site_logo_file" accept="image/*" onchange="previewFile(this, 'preview-site-logo')" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"/>
                            <input type="text" name="site_logo" value="<?= e($siteLogo) ?>" class="w-full px-3 py-1.5 text-xs font-mono rounded-xl border border-slate-200 bg-white text-slate-700"/>
                        </div>
                    </div>

                    <!-- 2. Negative Footer Logo -->
                    <div class="p-5 rounded-2xl border border-slate-200/80 bg-slate-50/40 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-slate-800 uppercase tracking-wide">Footer Negatif Logo</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-900 text-white border border-slate-700">Koyu Zemin</span>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Koyu yeşil veya siyah altbilgi alanlarında kullanılır.</p>
                            
                            <!-- Preview Box (Dark BG) -->
                            <div class="w-full h-24 rounded-xl border border-dashed border-slate-700 bg-emerald-900 flex items-center justify-center p-3 shadow-2xs">
                                <img id="preview-site-logo-neg" src="<?= asset($siteLogoNeg) ?>" alt="Negatif Logo" class="max-h-full max-w-full object-contain"/>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2">
                            <label class="block text-xs font-bold text-slate-700">Yeni Negatif Logo Dosyası</label>
                            <input type="file" name="site_logo_negative_file" accept="image/*" onchange="previewFile(this, 'preview-site-logo-neg')" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"/>
                            <input type="text" name="site_logo_negative" value="<?= e($siteLogoNeg) ?>" class="w-full px-3 py-1.5 text-xs font-mono rounded-xl border border-slate-200 bg-white text-slate-700"/>
                        </div>
                    </div>

                    <!-- 3. Favicon -->
                    <div class="p-5 rounded-2xl border border-slate-200/80 bg-slate-50/40 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-slate-800 uppercase tracking-wide">Tarayıcı Favicon</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 border border-teal-200">16x16 / 32x32</span>
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Tarayıcı sekmelerinde ve yer imlerinde gösterilen simge.</p>
                            
                            <!-- Preview Box -->
                            <div class="w-full h-24 rounded-xl border border-dashed border-slate-300 bg-white flex items-center justify-center p-3 shadow-2xs">
                                <div class="flex items-center gap-3 px-3.5 py-2 bg-slate-50 rounded-xl border border-slate-200">
                                    <img id="preview-site-favicon" src="<?= asset($siteFavicon) ?>" alt="Favicon" class="size-6 object-contain"/>
                                    <span class="text-xs font-bold text-slate-700">seyitler.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2">
                            <label class="block text-xs font-bold text-slate-700">Yeni Favicon Dosyası</label>
                            <input type="file" name="site_favicon_file" accept="image/png,image/x-icon,image/webp,image/svg+xml" onchange="previewFile(this, 'preview-site-favicon')" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"/>
                            <input type="text" name="site_favicon" value="<?= e($siteFavicon) ?>" class="w-full px-3 py-1.5 text-xs font-mono rounded-xl border border-slate-200 bg-white text-slate-700"/>
                        </div>
                    </div>

                </div>

                <!-- General Site Title & Description -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Site Genel Başlığı (Brand Title)</label>
                        <input type="text" name="site_title" value="<?= e($siteTitle) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Site Kısa Sloganı (Tagline)</label>
                        <input type="text" name="site_description" value="<?= e($siteDesc) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TAB 3: CONTACT & FACTORY -->
        <!-- ============================================================ -->
        <div id="tab-contact" class="space-y-6 hidden">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
                <div class="pb-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Fabrika & Genel Merkez İletişim Bilgileri</h3>
                    <p class="text-xs text-slate-400">Üst çubuk, iletişim sayfası ve footer alanındaki dinamik fabrika verileri</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Fabrika Telefon Santrali *</label>
                        <input type="text" name="company_phone" value="<?= e(SiteSetting::get('company_phone')) ?>" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-mono font-bold"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kurumsal E-posta Adresi *</label>
                        <input type="email" name="company_email" value="<?= e(SiteSetting::get('company_email')) ?>" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-mono font-bold"/>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Açık Fabrika ve Tesis Adresi *</label>
                    <textarea name="company_address" rows="3" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-900 font-semibold"><?= e(SiteSetting::get('company_address')) ?></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Google Haritalar Bağlantısı (Maps Embed / URL)</label>
                    <input type="text" name="google_maps_url" value="<?= e(SiteSetting::get('google_maps_url')) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800 font-mono"/>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TAB 4: VIDEO BANNERS -->
        <!-- ============================================================ -->
        <div id="tab-media" class="space-y-6 hidden">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
                <div class="pb-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Anasayfa Video Bannerları</h3>
                    <p class="text-xs text-slate-400">Anasayfada otomatik oynatılan MP4/WebM video bağlantıları</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">1. Video Banner (SILIONYX Ürün Afişi)</label>
                    <input type="text" name="banner_video_1" value="<?= e(SiteSetting::get('banner_video_1')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">2. Video Banner (Ürünler Tanıtım Videosu)</label>
                    <input type="text" name="banner_video_2" value="<?= e(SiteSetting::get('banner_video_2')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">3. Video Banner (Faaliyet Alanları Videosu)</label>
                    <input type="text" name="banner_video_3" value="<?= e(SiteSetting::get('banner_video_3')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TAB 5: STATS & BUTTONS -->
        <!-- ============================================================ -->
        <div id="tab-stats" class="space-y-6 hidden">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
                <div class="pb-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Üretim Sayaçları & Portal Butonları</h3>
                    <p class="text-xs text-slate-400">Fabrika üretim istatistikleri ve kurumsal e-katalog indirme bağlantısı</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kapalı Alan Sayaç Değeri</label>
                        <input type="text" name="stat_area" value="<?= e(SiteSetting::get('stat_area')) ?>" class="w-full px-4 py-2.5 text-xs font-bold rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ürün Çeşidi Sayaç Değeri</label>
                        <input type="text" name="stat_products" value="<?= e(SiteSetting::get('stat_products')) ?>" class="w-full px-4 py-2.5 text-xs font-bold rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">İhracat Ülke Sayısı</label>
                        <input type="text" name="stat_countries" value="<?= e(SiteSetting::get('stat_countries')) ?>" class="w-full px-4 py-2.5 text-xs font-bold rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900"/>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">E-Katalog İndirme Bağlantısı (PDF URL)</label>
                        <input type="text" name="catalog_pdf_url" value="<?= e(SiteSetting::get('catalog_pdf_url')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">B2B Bayi Portalı URL</label>
                        <input type="text" name="b2b_portal_url" value="<?= e(SiteSetting::get('b2b_portal_url')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TAB 6: SOCIAL & SEO -->
        <!-- ============================================================ -->
        <div id="tab-social" class="space-y-6 hidden">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
                <div class="pb-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Resmi Sosyal Medya Profilleri & SEO Analitiği</h3>
                    <p class="text-xs text-slate-400">Google Analytics, Search Console ve resmi sosyal medya bağlantıları</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">LinkedIn Profili</label>
                        <input type="text" name="social_linkedin" value="<?= e(SiteSetting::get('social_linkedin')) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Instagram Profili</label>
                        <input type="text" name="social_instagram" value="<?= e(SiteSetting::get('social_instagram')) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">X (Twitter) Profili</label>
                        <input type="text" name="social_twitter" value="<?= e(SiteSetting::get('social_twitter')) ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Google Analytics İzleme Kodu (G-XXXXXXX)</label>
                        <input type="text" name="google_analytics_id" value="<?= e(SiteSetting::get('google_analytics_id')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Google Search Console Doğrulama Kodu</label>
                        <input type="text" name="google_search_console_code" value="<?= e(SiteSetting::get('google_search_console_code')) ?>" class="w-full px-4 py-2.5 text-xs font-mono rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white text-slate-800"/>
                    </div>
                </div>
            </div>
        </div>
<!-- Sticky Save Action Bar for Settings -->
        <div id="save-action-bar" class="p-4 bg-white/90 backdrop-blur-md rounded-2xl border border-slate-200/80 shadow-md flex items-center justify-between sticky bottom-6 z-20">
            <span class="text-xs text-slate-400 hidden sm:inline">Yapılan ayar değişiklikleri sitede anında aktifleşir.</span>
            <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Ayarları Kaydet ve Yayınla</span>
            </button>
        </div>

    </form>

    <!-- ============================================================ -->
    <!-- TAB 2: SECURITY & ADMIN CREDENTIALS -->
    <!-- ============================================================ -->
    <div id="tab-security" class="space-y-6 hidden">
        
        <!-- Section 1: Username & Email Change -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="pb-4 border-b border-slate-100 flex items-center gap-3">
                <div class="size-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Yönetici Giriş Bilgileri (Kullanıcı Adı & E-posta)</h3>
                    <p class="text-xs text-slate-400">Giriş yaparken kullanacağınız kullanıcı adı ve e-posta adresini buradan güncelleyebilirsiniz</p>
                </div>
            </div>

            <form method="POST" action="<?= url('/podmin/settings/profile') ?>" class="space-y-5 max-w-xl">
                <?= csrf_field() ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kullanıcı Adı *</label>
                        <input type="text" name="username" value="<?= e($currentUser['username'] ?? 'admin') ?>" required minlength="3" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Giriş E-posta Adresi *</label>
                        <input type="email" name="email" value="<?= e($currentUser['email'] ?? 'admin@seyitler.com') ?>" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Yönetici Adı Soyadı</label>
                    <input type="text" name="full_name" value="<?= e($currentUser['full_name'] ?? 'Yönetici') ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">İşlemi Onaylamak İçin Geçerli Şifreniz *</label>
                    <input type="password" name="confirm_password" required placeholder="Mevcut yönetici şifreniz" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-mono"/>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-7 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-slate-900 hover:bg-black shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="size-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>Giriş Bilgilerini Kaydet</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Section 2: Password Change -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="pb-4 border-b border-slate-100 flex items-center gap-3">
                <div class="size-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Yönetici Giriş Şifresi Değiştirme</h3>
                    <p class="text-xs text-slate-400">Panel oturum güvenliğiniz için şifrenizi düzenli aralıklarla yenileyiniz</p>
                </div>
            </div>

            <form method="POST" action="<?= url('/podmin/settings/change-password') ?>" class="space-y-6 max-w-xl">
                <?= csrf_field() ?>

                <!-- Current User Info -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3.5">
                    <div class="size-11 rounded-xl bg-gradient-to-tr from-brand-600 to-emerald-400 text-white font-bold flex items-center justify-center shrink-0 shadow-xs text-sm">
                        <?= strtoupper(substr($currentUser['username'] ?? 'A', 0, 1)) ?>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-800">Aktif Yönetici: <span class="text-emerald-700"><?= e($currentUser['username'] ?? 'Admin') ?></span> (<?= e($currentUser['email'] ?? 'admin@seyitler.com') ?>)</div>
                        <div class="text-[11px] text-slate-400">Şifreniz en az 6 karakter olmalı ve harf-sayı kombinasyonu içermelidir.</div>
                    </div>
                </div>

                <!-- Current Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Mevcut Yönetici Şifreniz *</label>
                    <div class="relative">
                        <input type="password" id="current_password" name="current_password" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none pr-11 font-mono text-slate-900"/>
                        <button type="button" onclick="togglePass('current_password', this)" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Yeni Güvenli Şifre *</label>
                    <div class="relative">
                        <input type="password" id="new_password" name="new_password" minlength="6" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none pr-11 font-mono text-slate-900"/>
                        <button type="button" onclick="togglePass('new_password', this)" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm New Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Yeni Şifre Tekrarı *</label>
                    <div class="relative">
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" minlength="6" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none pr-11 font-mono text-slate-900"/>
                        <button type="button" onclick="togglePass('new_password_confirmation', this)" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center gap-2 cursor-pointer">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                        <span>Şifremi Güvenli Şekilde Güncelle</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
function switchSettingTab(tabId) {
    const tabs = ['branding', 'security', 'contact', 'media', 'stats', 'social'];
    const saveActionBar = document.getElementById('save-action-bar');

    tabs.forEach(t => {
        const pane = document.getElementById('tab-' + t);
        const btn = document.getElementById('btn-tab-' + t);
        if (pane) {
            if (t === tabId) {
                pane.classList.remove('hidden');
            } else {
                pane.classList.add('hidden');
            }
        }
        if (btn) {
            if (t === tabId) {
                btn.className = 'tab-btn px-3.5 py-2 text-xs font-semibold rounded-xl transition-all flex items-center gap-2 bg-emerald-50 text-emerald-800 border border-emerald-200/60 shadow-xs';
            } else {
                btn.className = 'tab-btn px-3.5 py-2 text-xs font-medium rounded-xl transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-50';
            }
        }
    });

    if (saveActionBar) {
        if (tabId === 'security') {
            saveActionBar.classList.add('hidden');
        } else {
            saveActionBar.classList.remove('hidden');
        }
    }
}

function previewFile(input, targetImgId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById(targetImgId);
            if (img) {
                img.src = e.target.result;
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function togglePass(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        btn.classList.add('text-emerald-600');
    } else {
        input.type = 'password';
        btn.classList.remove('text-emerald-600');
    }
}
</script>
