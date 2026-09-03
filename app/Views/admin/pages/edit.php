<?php
/** @var array $page */
use App\Models\Page;

$sections = Page::getSectionsData($page);
$hero = $sections['hero'] ?? [];
$images = $sections['images'] ?? [];
$img1 = $images[0] ?? ['url' => '', 'alt' => ''];
$img2 = $images[1] ?? ['url' => '', 'alt' => ''];
$buttons = $sections['buttons'] ?? [];
$btn1 = $buttons[0] ?? ['text_tr' => '', 'text_en' => '', 'text_ar' => '', 'url' => '', 'target' => '_self'];
$btn2 = $buttons[1] ?? ['text_tr' => '', 'text_en' => '', 'text_ar' => '', 'url' => '', 'target' => '_self'];
$timeline = $sections['timeline'] ?? [];
$video = Page::getVideo($page);

// Akıllı Medya Etiketleri
$img1Label = '1. Tanıtım Görseli';
$img2Label = '2. Tanıtım Görseli';
$hasVideo = in_array($page['slug'], ['rd', 'areas', 'home', 'about-us'], true) || !empty($video['url']);

if ($page['slug'] === 'organization') {
    $img1Label = 'Başkanın Portre Fotoğrafı';
    $img2Label = 'Organizasyon Şeması Görseli';
} elseif ($page['slug'] === 'mission-vision') {
    $img1Label = 'Misyonumuz Tanıtım Görseli';
    $img2Label = 'Vizyonumuz Tanıtım Görseli';
} elseif ($page['slug'] === 'sustainability') {
    $img1Label = 'Sürdürülebilirlik Geniş Banner Görseli';
    $img2Label = 'İkinci Çevre & Tesis Görseli';
} elseif ($page['slug'] === 'human-resources') {
    $img1Label = 'İnsan Kaynakları Banner Görseli';
    $img2Label = 'Ekip / Çalışma Ortamı Görseli';
} elseif ($page['slug'] === 'rd') {
    $img1Label = 'Ar-Ge Laboratuvarı Görseli';
    $img2Label = 'İnovasyon & Test Merkezi Görseli';
} elseif ($page['slug'] === 'areas') {
    $img1Label = 'Üretim Tesisi Görseli (Video Posteri)';
    $img2Label = 'Küresel Dağıtım & İhracat Görseli';
} elseif ($page['slug'] === 'about-us') {
    $img1Label = '1. Üretim & Tesis Görseli';
    $img2Label = '2. Fabrika & Makine Parkuru Görseli';
}

$publicUrl = $page['slug'] === 'home' 
    ? url('/') 
    : (in_array($page['slug'], ['history', 'mission-vision', 'values', 'organization', 'sustainability', 'human-resources'], true) 
        ? url('/about-us/' . $page['slug']) 
        : ($page['slug'] === 'cookie-policy' ? url('/cerez-politikasi') : url('/' . $page['slug'])));
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-3 border-b border-slate-200/80 sticky top-0 bg-slate-50/90 backdrop-blur-md z-20 pt-1">
        <div class="flex items-center gap-3">
            <a href="<?= url('/podmin/pages') ?>" class="p-2 text-slate-400 hover:text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors shadow-2xs">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-0.5">
                    <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Modüler Sayfa & İçerik Editörü</span>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold font-display text-slate-900 tracking-tight flex items-center gap-2">
                    <span><?= e($page['title_tr']) ?></span>
                    <span class="text-xs font-mono font-normal text-slate-400 bg-slate-100 px-2 py-0.5 rounded-lg">/<?= e($page['slug']) ?></span>
                </h1>
            </div>
        </div>
        <div class="flex items-center gap-2.5 shrink-0">
            <a href="<?= $publicUrl ?>" target="_blank" class="px-3.5 py-2 text-xs font-bold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition-all shadow-xs flex items-center gap-1.5">
                <svg class="size-3.5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                <span>Canlıda Önizle</span>
            </a>
            <button type="submit" form="page-edit-form" class="px-5 py-2 bg-[#0AA64D] hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-md shadow-emerald-600/20 transition-all flex items-center gap-1.5 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Değişiklikleri Kaydet</span>
            </button>
        </div>
    </div>

    <!-- Main Form -->
    <form id="page-edit-form" method="POST" action="<?= url('/podmin/pages/' . $page['id'] . '/update') ?>" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- SECTION 1: HERO / BANNER & TEMEL BİLGİLER -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-8 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xs">01</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Üst Başlık, Slogan & Hero Banner</h3>
                    <p class="text-xs text-slate-400">Sayfanın en üstünde gösterilen kurumsal tanıtım ve rozet bilgileri</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori / Üst Rozet</label>
                    <input type="text" name="hero_badge" value="<?= e($hero['badge'] ?? $page['title_tr']) ?>" placeholder="Örn: Kurumsal" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-semibold"/>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sayfa Başlığı (TR) *</label>
                    <input type="text" name="title_tr" value="<?= e($page['title_tr']) ?>" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Vurgulu Hero Başlık</label>
                    <input type="text" name="hero_title" value="<?= e($hero['title'] ?? $page['title_tr']) ?>" placeholder="Örn: Sağlıkta Güvenin Global Adı" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Alt Başlık / Kurumsal Slogan</label>
                    <input type="text" name="hero_subtitle" value="<?= e($hero['subtitle'] ?? $page['subtitle_tr'] ?? '') ?>" placeholder="1991 yılından bu yana üretim gücümüz..." class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Üst Banner Görseli (Dosya veya Yol)</label>
                    <div class="flex items-center gap-2">
                        <input type="text" name="header_image" value="<?= e($page['header_image'] ?? '') ?>" placeholder="assets/images/..." class="flex-1 px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none font-mono text-slate-700"/>
                        <label class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold cursor-pointer transition-colors shrink-0">
                            <span>Gözat</span>
                            <input type="file" name="header_image_file" accept="image/*" class="hidden"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: MEDYA & SAYFA İÇİ GÖRSELLER -->
        <!-- SECTION 2: MEDYA, VİDEO & GÖRSEL YÖNETİMİ -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="size-8 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-xs">02</div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Medya, Video & Görseller</h3>
                        <p class="text-xs text-slate-400">Sayfada yer alan video gösterimleri, ana tanıtım görselleri ve galeri fotoğrafları</p>
                    </div>
                </div>
                <span class="text-[11px] font-bold px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                    <?= !empty($video['url']) ? 'Video + Görseller Aktif' : 'Görseller Aktif' ?>
                </span>
            </div>

            <!-- 2.A: SAYFA TANITIM VİDEOSU -->
            <div class="p-5 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-950 text-white shadow-md border border-slate-800 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-white/10">
                    <div class="flex items-center gap-2.5">
                        <div class="size-8 rounded-xl bg-red-600/30 border border-red-500/40 text-red-400 flex items-center justify-center">
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="m9.5 7.5 7 4.5-7 4.5z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-white flex items-center gap-2">
                                <span>Sayfa Tanıtım Videosu (Video Showcase)</span>
                                <?php if ($hasVideo): ?>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 font-normal">Bu Sayfada Video Var</span>
                                <?php endif; ?>
                            </h4>
                            <p class="text-[11px] text-slate-400">Sayfadaki tanıtım videosunu, MP4 bağlantısını veya video kapak görselini buradan yönetebilirsiniz.</p>
                        </div>
                    </div>
                    <?php if (!empty($video['url'])): ?>
                        <a href="<?= str_starts_with($video['url'], 'http') ? $video['url'] : asset($video['url']) ?>" target="_blank" class="px-2.5 py-1 rounded-lg bg-white/10 hover:bg-white/20 text-[11px] text-slate-200 transition-colors flex items-center gap-1.5 self-start sm:self-auto">
                            <svg class="size-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                            <span>Videoyu Aç</span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                    <!-- Inputs -->
                    <div class="md:col-span-7 space-y-3">
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-300 mb-1">Video Dosya Yolu veya Harici URL (MP4 / WebM)</label>
                            <input type="text" name="video_url" value="<?= e($video['url'] ?? '') ?>" placeholder="https://r2-content-api.../ArGe.mp4 veya assets/videos/tanitim.mp4" class="w-full px-3 py-2 text-xs rounded-xl border border-white/15 bg-white/5 font-mono text-white placeholder-slate-500 outline-none focus:border-red-500 focus:bg-white/10"/>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-300 mb-1">Yeni Video Dosyası Yükle</label>
                                <input type="file" name="video_file" accept="video/mp4,video/webm,video/ogg" class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-red-600/30 file:text-red-200 hover:file:bg-red-600/50"/>
                                <span class="text-[10px] text-slate-500 mt-0.5 block">Formatlar: .mp4, .webm (Maks 100MB)</span>
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-slate-300 mb-1">Video Başlığı (Title)</label>
                                <input type="text" name="video_title" value="<?= e($video['title'] ?? '') ?>" placeholder="Seyitler Kimya Tanıtım Filmi" class="w-full px-3 py-2 text-xs rounded-xl border border-white/15 bg-white/5 text-white placeholder-slate-500 outline-none focus:border-red-500 focus:bg-white/10"/>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-semibold text-slate-300 mb-1">Video Kapak Görseli (Poster) URL</label>
                            <input type="text" name="video_poster" value="<?= e($video['poster'] ?? '') ?>" placeholder="assets/images/arge_1-min.webp" class="w-full px-3 py-2 text-xs rounded-xl border border-white/15 bg-white/5 font-mono text-white placeholder-slate-500 outline-none focus:border-red-500 focus:bg-white/10"/>
                        </div>
                    </div>

                    <!-- Video Preview Player -->
                    <div class="md:col-span-5 bg-black/40 rounded-xl p-3 border border-white/10 flex flex-col items-center justify-center text-center">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Canlı Video Önizlemesi</span>
                        <?php if (!empty($video['url'])): ?>
                            <video controls preload="metadata" class="w-full max-h-44 rounded-lg bg-black object-cover shadow-inner" src="<?= str_starts_with($video['url'], 'http') ? $video['url'] : asset($video['url']) ?>" poster="<?= !empty($video['poster']) ? asset($video['poster']) : '' ?>"></video>
                        <?php else: ?>
                            <div class="py-8 px-4 text-slate-500 text-xs flex flex-col items-center gap-2">
                                <svg class="size-8 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                                <span>Bu sayfa için henüz bir video bağlantısı girilmedi.</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- 2.B: SAYFA ANA GÖRSELLERİ -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <!-- Image 1 -->
                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                            <span class="size-2 rounded-full bg-blue-600"></span>
                            <span><?= e($img1Label) ?></span>
                        </span>
                        <?php if (!empty($img1['url'])): ?>
                            <a href="<?= asset($img1['url']) ?>" target="_blank" class="text-[11px] text-emerald-700 hover:underline font-semibold flex items-center gap-1">
                                <svg class="size-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/></svg>
                                <span>Görseli Gör</span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($img1['url'])): ?>
                        <div class="w-full h-32 rounded-xl overflow-hidden border border-slate-200 bg-white shadow-2xs">
                            <img src="<?= asset($img1['url']) ?>" alt="<?= e($img1['alt'] ?? '') ?>" class="w-full h-full object-cover"/>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Dosya Yolu veya URL</label>
                        <input type="text" name="image_1_url" value="<?= e($img1['url'] ?? '') ?>" placeholder="assets/images/..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono text-slate-700 outline-none focus:border-emerald-500"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Yeni Dosya Yükle</label>
                        <input type="file" name="image_1_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">SEO Alt Açıklaması</label>
                        <input type="text" name="image_1_alt" value="<?= e($img1['alt'] ?? '') ?>" placeholder="<?= e($img1Label) ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-800 outline-none focus:border-emerald-500"/>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                            <span class="size-2 rounded-full bg-purple-600"></span>
                            <span><?= e($img2Label) ?></span>
                        </span>
                        <?php if (!empty($img2['url'])): ?>
                            <a href="<?= asset($img2['url']) ?>" target="_blank" class="text-[11px] text-emerald-700 hover:underline font-semibold flex items-center gap-1">
                                <svg class="size-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/></svg>
                                <span>Görseli Gör</span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($img2['url'])): ?>
                        <div class="w-full h-32 rounded-xl overflow-hidden border border-slate-200 bg-white shadow-2xs">
                            <img src="<?= asset($img2['url']) ?>" alt="<?= e($img2['alt'] ?? '') ?>" class="w-full h-full object-cover"/>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Dosya Yolu veya URL</label>
                        <input type="text" name="image_2_url" value="<?= e($img2['url'] ?? '') ?>" placeholder="assets/images/..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono text-slate-700 outline-none focus:border-emerald-500"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Yeni Dosya Yükle</label>
                        <input type="file" name="image_2_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">SEO Alt Açıklaması</label>
                        <input type="text" name="image_2_alt" value="<?= e($img2['alt'] ?? '') ?>" placeholder="<?= e($img2Label) ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-800 outline-none focus:border-emerald-500"/>
                    </div>
                </div>
            </div>

            <!-- 2.C: ÇOKLU GALERİ GÖRSELLERİ (Özellikle Galeri Barındıran Sayfalar İçin) -->
            <?php 
            $extraImages = array_slice($images, 2);
            ?>
            <div class="pt-4 border-t border-slate-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-slate-800">Ek Galeri Görselleri (Çoklu Medya)</span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 text-slate-600 font-mono"><?= count($extraImages) ?> adet ekli</span>
                    </div>
                    <button type="button" onclick="addGalleryRow()" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-lg transition-colors cursor-pointer flex items-center gap-1">
                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        <span>Galeri Görseli Ekle</span>
                    </button>
                </div>

                <div id="gallery-container" class="space-y-3">
                    <?php if (empty($extraImages)): ?>
                        <div id="gallery-empty-hint" class="p-4 rounded-xl border border-dashed border-slate-200 text-center text-xs text-slate-400 bg-slate-50/50">
                            Sayfaya özel ek galeri görselleri eklemek için yukarıdaki "Galeri Görseli Ekle" butonunu kullanabilirsiniz.
                        </div>
                    <?php else: ?>
                        <?php foreach ($extraImages as $idx => $extraImg): ?>
                            <div class="gallery-row p-3 rounded-xl border border-slate-200 bg-slate-50 flex items-center gap-3">
                                <?php if (!empty($extraImg['url'])): ?>
                                    <img src="<?= asset($extraImg['url']) ?>" class="size-10 rounded-lg object-cover border border-slate-200 shrink-0"/>
                                <?php endif; ?>
                                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-2">
                                    <input type="text" name="gallery_image_url[]" value="<?= e($extraImg['url'] ?? '') ?>" placeholder="Görsel URL / Dosya Yolu" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white font-mono text-slate-700 outline-none"/>
                                    <input type="text" name="gallery_image_alt[]" value="<?= e($extraImg['alt'] ?? '') ?>" placeholder="Görsel Başlığı / Açıklaması" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white text-slate-700 outline-none"/>
                                </div>
                                <button type="button" onclick="this.closest('.gallery-row').remove()" class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition-colors cursor-pointer shrink-0">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
        function addGalleryRow() {
            var hint = document.getElementById('gallery-empty-hint');
            if (hint) hint.remove();
            var container = document.getElementById('gallery-container');
            var row = document.createElement('div');
            row.className = 'gallery-row p-3 rounded-xl border border-slate-200 bg-slate-50 flex items-center gap-3 animate-fade-in';
            row.innerHTML = '<div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-2">' +
                '<input type="text" name="gallery_image_url[]" placeholder="assets/images/galeri_01.jpg" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white font-mono text-slate-700 outline-none focus:border-blue-500"/>' +
                '<input type="text" name="gallery_image_alt[]" placeholder="Galeri Görseli Açıklaması" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white text-slate-700 outline-none focus:border-blue-500"/>' +
                '</div>' +
                '<button type="button" onclick="this.closest(\'.gallery-row\').remove()" class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition-colors cursor-pointer shrink-0">' +
                '<svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>' +
                '</button>';
            container.appendChild(row);
        }
        </script>

        <!-- SECTION 3: AKSİYON BUTONLARI & LİNKLER -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-8 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-xs">03</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Sayfa İçi Eylem Butonları (Call-To-Action)</h3>
                    <p class="text-xs text-slate-400">Kullanıcıyı ürün kataloğuna, iletişim formuna veya dokümanlara yönlendiren dinamik butonlar</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Primary Button -->
                <div class="p-4 rounded-2xl bg-emerald-50/40 border border-emerald-200/60 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-emerald-950 flex items-center gap-1.5">
                            <span class="size-2 rounded-full bg-emerald-600"></span>
                            <span>Birincil Buton (Primary CTA)</span>
                        </span>
                        <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Yeşil Buton</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (TR)</label>
                            <input type="text" name="btn_primary_text_tr" value="<?= e($btn1['text_tr'] ?? '') ?>" placeholder="Ürünleri İnceleyin" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (EN)</label>
                            <input type="text" name="btn_primary_text_en" value="<?= e($btn1['text_en'] ?? '') ?>" placeholder="Explore Products" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (AR)</label>
                            <input type="text" name="btn_primary_text_ar" dir="rtl" value="<?= e($btn1['text_ar'] ?? '') ?>" placeholder="استكشف المنتجات" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Yönlendirme Linki (URL)</label>
                            <input type="text" name="btn_primary_url" value="<?= e($btn1['url'] ?? '') ?>" placeholder="/products veya https://..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono text-slate-800 outline-none"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Hedef Pencere</label>
                            <select name="btn_primary_target" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-800 outline-none">
                                <option value="_self" <?= ($btn1['target'] ?? '') === '_self' ? 'selected' : '' ?>>Aynı Sekmede Aç (_self)</option>
                                <option value="_blank" <?= ($btn1['target'] ?? '') === '_blank' ? 'selected' : '' ?>>Yeni Sekmede Aç (_blank)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Secondary Button -->
                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                            <span class="size-2 rounded-full bg-slate-400"></span>
                            <span>İkincil Buton (Secondary CTA)</span>
                        </span>
                        <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded bg-slate-200 text-slate-700">Açık Buton</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (TR)</label>
                            <input type="text" name="btn_sec_text_tr" value="<?= e($btn2['text_tr'] ?? '') ?>" placeholder="İletişime Geçin" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (EN)</label>
                            <input type="text" name="btn_sec_text_en" value="<?= e($btn2['text_en'] ?? '') ?>" placeholder="Contact Us" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Metin (AR)</label>
                            <input type="text" name="btn_sec_text_ar" dir="rtl" value="<?= e($btn2['text_ar'] ?? '') ?>" placeholder="اتصل بنا" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-900 outline-none font-semibold"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Yönlendirme Linki (URL)</label>
                            <input type="text" name="btn_sec_url" value="<?= e($btn2['url'] ?? '') ?>" placeholder="/contact veya https://..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-mono text-slate-800 outline-none"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-1">Hedef Pencere</label>
                            <select name="btn_sec_target" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-800 outline-none">
                                <option value="_self" <?= ($btn2['target'] ?? '') === '_self' ? 'selected' : '' ?>>Aynı Sekmede Aç (_self)</option>
                                <option value="_blank" <?= ($btn2['target'] ?? '') === '_blank' ? 'selected' : '' ?>>Yeni Sekmede Aç (_blank)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 4: ÇOK DİLLİ PARAGRAFLAR & GÖVDE METİNLERİ -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="size-8 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">04</div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Çok Dilli Gövde Metinleri & Paragraflar</h3>
                        <p class="text-xs text-slate-400">Sayfanın ana metin içeriği (Paragraflar arasına boş bir satır bırakınız)</p>
                    </div>
                </div>

                <!-- Language Tabs Switcher -->
                <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl">
                    <button type="button" onclick="switchContentLang('tr')" id="btn-lang-tr" class="px-3 py-1 text-xs font-bold rounded-lg transition-all bg-white text-slate-900 shadow-xs">🇹🇷 TR</button>
                    <button type="button" onclick="switchContentLang('en')" id="btn-lang-en" class="px-3 py-1 text-xs font-bold rounded-lg transition-all text-slate-500 hover:text-slate-900">🇬🇧 EN</button>
                    <button type="button" onclick="switchContentLang('ar')" id="btn-lang-ar" class="px-3 py-1 text-xs font-bold rounded-lg transition-all text-slate-500 hover:text-slate-900">🇸🇦 AR</button>
                </div>
            </div>

            <!-- TR Content -->
            <div id="panel-lang-tr" class="space-y-2">
                <label class="block text-xs font-bold text-slate-700">Türkçe Paragraflar</label>
                <?php 
                $parasTr = $sections['paragraphs_tr'] ?? [];
                $textTr = !empty($parasTr) ? implode("\n\n", $parasTr) : ($page['content_tr'] ?? '');
                ?>
                <textarea name="content_tr" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800 font-sans" placeholder="Her paragraf arasına bir satır boşluk bırakarak yazınız..."><?= e($textTr) ?></textarea>
            </div>

            <!-- EN Content -->
            <div id="panel-lang-en" class="space-y-2 hidden">
                <label class="block text-xs font-bold text-slate-700">English Paragraphs</label>
                <?php 
                $parasEn = $sections['paragraphs_en'] ?? [];
                $textEn = !empty($parasEn) ? implode("\n\n", $parasEn) : ($page['content_en'] ?? '');
                ?>
                <textarea name="content_en" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800 font-sans" placeholder="Write paragraphs separated by an empty line..."><?= e($textEn) ?></textarea>
            </div>

            <!-- AR Content -->
            <div id="panel-lang-ar" class="space-y-2 hidden">
                <label class="block text-xs font-bold text-slate-700">الفقرات باللغة العربية</label>
                <?php 
                $parasAr = $sections['paragraphs_ar'] ?? [];
                $textAr = !empty($parasAr) ? implode("\n\n", $parasAr) : ($page['content_ar'] ?? '');
                ?>
                <textarea name="content_ar" dir="rtl" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800 font-sans" placeholder="اكتب الفقرات مع ترك سطر فارغ بين كل فقرة..."><?= e($textAr) ?></textarea>
            </div>
        </div>

        <!-- SECTION 5: SAYFAYA ÖZEL DİNAMİK BLOKLAR (Tarihçe Zaman Çizelgesi vb.) -->
        <?php if ($page['slug'] === 'history'): ?>
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-xs">05</div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm">Tarihçe Zaman Çizelgesi (Milestones)</h3>
                            <p class="text-xs text-slate-400">Yıllara göre kurumsal başarılar, yatırımlar ve dönüm noktaları</p>
                        </div>
                    </div>
                </div>

                <div id="timeline-container" class="space-y-4">
                    <?php foreach ($timeline as $tIdx => $t): ?>
                        <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 grid grid-cols-1 sm:grid-cols-12 gap-3 items-start">
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Yıl</label>
                                <input type="text" name="timeline_year[]" value="<?= e($t['year'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-bold text-emerald-800 outline-none"/>
                            </div>
                            <div class="sm:col-span-4">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Başlık (TR)</label>
                                <input type="text" name="timeline_title_tr[]" value="<?= e($t['title_tr'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white font-semibold text-slate-800 outline-none"/>
                            </div>
                            <div class="sm:col-span-6">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Açıklama (TR)</label>
                                <input type="text" name="timeline_desc_tr[]" value="<?= e($t['desc_tr'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 outline-none"/>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- SECTION 6: GOOGLE SEO & YAYIN AYARLARI -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-8 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-bold text-xs">06</div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Google SEO & Yayın Durumu</h3>
                    <p class="text-xs text-slate-400">Arama motorları için Meta Title, Meta Description ve görünürlük</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Google Meta Başlığı (TR)</label>
                    <input type="text" name="meta_title_tr" value="<?= e($page['meta_title_tr'] ?? '') ?>" placeholder="Örn: Hakkımızda - Seyitler Kimya" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800 font-semibold"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Google Meta Açıklaması (TR)</label>
                    <input type="text" name="meta_desc_tr" value="<?= e($page['meta_desc_tr'] ?? '') ?>" placeholder="Seyitler Kimya kurumsal yapısı ve üretim gücü..." class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" <?= !empty($page['is_active']) ? 'checked' : '' ?> class="size-5 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300"/>
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">Sayfa Yayında Olsun</span>
                            <span class="text-[11px] text-slate-400">İşareti kaldırırsanız sayfa ziyaretçilere gizlenir.</span>
                        </div>
                    </label>

                    <div class="flex items-center gap-2 pl-4 border-l border-slate-200">
                        <label class="text-xs font-bold text-slate-700 whitespace-nowrap">Menü Sırası:</label>
                        <input type="number" name="sort_order" value="<?= (int)($page['sort_order'] ?? 0) ?>" class="w-16 px-2.5 py-1.5 text-xs rounded-xl border border-slate-200 bg-slate-50 text-slate-900 font-bold text-center outline-none focus:bg-white focus:border-emerald-500"/>
                    </div>
                </div>

                <button type="submit" class="px-6 py-2.5 bg-[#0AA64D] hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-md shadow-emerald-600/20 transition-all flex items-center gap-1.5 cursor-pointer">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    <span>Değişiklikleri Kaydet</span>
                </button>
            </div>
        </div>

    </form>
</div>

<script>
function switchContentLang(lang) {
    ['tr', 'en', 'ar'].forEach(l => {
        const btn = document.getElementById('btn-lang-' + l);
        const panel = document.getElementById('panel-lang-' + l);
        if (l === lang) {
            btn.className = 'px-3 py-1 text-xs font-bold rounded-lg transition-all bg-white text-slate-900 shadow-xs';
            panel.classList.remove('hidden');
        } else {
            btn.className = 'px-3 py-1 text-xs font-bold rounded-lg transition-all text-slate-500 hover:text-slate-900';
            panel.classList.add('hidden');
        }
    });
}
</script>
