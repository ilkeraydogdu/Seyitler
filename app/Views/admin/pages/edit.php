<?php
/** @var array $page */
$publicUrl = url('/' . ($page['slug'] === 'history' || $page['slug'] === 'mission-vision' || $page['slug'] === 'values' || $page['slug'] === 'organization' || $page['slug'] === 'sustainability' || $page['slug'] === 'human-resources' ? 'about-us/' . $page['slug'] : $page['slug']));
?>

<div class="space-y-6 max-w-5xl mx-auto pb-16">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div class="flex items-center gap-3">
            <a href="<?= url('/podmin/pages') ?>" class="p-2 text-slate-400 hover:text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors shadow-2xs">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-0.5">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    <span>Sayfa İçerik & SEO Editörü</span>
                </div>
                <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight"><?= e($page['title_tr']) ?></h1>
                <p class="text-xs text-slate-500 font-mono mt-0.5">/<?= e($page['slug']) ?></p>
            </div>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="<?= $publicUrl ?>" target="_blank" class="px-4 py-2.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition-all shadow-xs flex items-center gap-2">
                <svg class="size-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                <span>Canlı Sayfayı Gör</span>
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <form method="POST" action="<?= url('/podmin/pages/' . $page['id'] . '/update') ?>" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Language Switcher Tab Bar -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl border border-slate-200/80 p-1.5 flex items-center gap-1.5 shadow-subtle sticky top-24 z-20">
            <button type="button" onclick="switchPageLang('tr')" id="btn-page-tr" class="px-4 py-2 text-xs font-bold rounded-xl transition-all bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-xs">
                🇹🇷 Türkçe (Varsayılan)
            </button>
            <button type="button" onclick="switchPageLang('en')" id="btn-page-en" class="px-4 py-2 text-xs font-bold rounded-xl transition-all text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                🇬🇧 English
            </button>
            <button type="button" onclick="switchPageLang('ar')" id="btn-page-ar" class="px-4 py-2 text-xs font-bold rounded-xl transition-all text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                🇸🇦 العربية
            </button>
        </div>

        <!-- Turkish Content Panel -->
        <div id="tab-page-tr" class="space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
                <div class="flex items-center gap-2 pb-3 border-b border-slate-100 text-slate-800 font-bold text-xs uppercase tracking-wider">
                    <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-extrabold text-[10px]">TR</span>
                    <span>Türkçe Sayfa İçeriği & SEO</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Sayfa Başlığı (TR) *</label>
                    <input type="text" name="title_tr" value="<?= e($page['title_tr']) ?>" required class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Alt Başlık / Slogan (TR)</label>
                    <input type="text" name="subtitle_tr" value="<?= e($page['subtitle_tr'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Sayfa Gövde Metni (TR)</label>
                    <textarea name="content_tr" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"><?= e($page['content_tr'] ?? '') ?></textarea>
                    <p class="text-[11px] text-slate-400 mt-1">Gövde metni boş bırakılırsa sayfanın şablonundaki varsayılan kurumsal metin korunur.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Google SEO Başlığı (TR)</label>
                        <input type="text" name="meta_title_tr" value="<?= e($page['meta_title_tr'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none" placeholder="Örn: Tarihçemiz - Seyitler Kimya"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Google SEO Açıklaması (Meta Description TR)</label>
                        <input type="text" name="meta_desc_tr" value="<?= e($page['meta_desc_tr'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- English Content Panel -->
        <div id="tab-page-en" class="space-y-6 hidden">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
                <div class="flex items-center gap-2 pb-3 border-b border-slate-100 text-slate-800 font-bold text-xs uppercase tracking-wider">
                    <span class="px-2 py-0.5 rounded bg-indigo-50 text-indigo-700 font-extrabold text-[10px]">EN</span>
                    <span>English Content & SEO</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Page Title (EN)</label>
                    <input type="text" name="title_en" value="<?= e($page['title_en'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none text-slate-900 font-bold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Subtitle / Slogan (EN)</label>
                    <input type="text" name="subtitle_en" value="<?= e($page['subtitle_en'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Page Body Content (EN)</label>
                    <textarea name="content_en" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none leading-relaxed text-slate-800"><?= e($page['content_en'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">SEO Title (EN)</label>
                        <input type="text" name="meta_title_en" value="<?= e($page['meta_title_en'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-none"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">SEO Description (EN)</label>
                        <input type="text" name="meta_desc_en" value="<?= e($page['meta_desc_en'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-none"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arabic Content Panel -->
        <div id="tab-page-ar" class="space-y-6 hidden" dir="rtl">
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-5">
                <div class="flex items-center gap-2 pb-3 border-b border-slate-100 text-slate-800 font-bold text-xs uppercase tracking-wider">
                    <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">AR</span>
                    <span>المحتوى العربي و SEO</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">عنوان الصفحة (AR)</label>
                    <input type="text" name="title_ar" value="<?= e($page['title_ar'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-900 font-bold"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">العنوان الفرعي (AR)</label>
                    <input type="text" name="subtitle_ar" value="<?= e($page['subtitle_ar'] ?? '') ?>" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none text-slate-800"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">نص محتوى الصفحة (AR)</label>
                    <textarea name="content_ar" rows="8" class="w-full px-4 py-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none leading-relaxed text-slate-800"><?= e($page['content_ar'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">عنوان SEO (AR)</label>
                        <input type="text" name="meta_title_ar" value="<?= e($page['meta_title_ar'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-none"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">وصف SEO (AR)</label>
                        <input type="text" name="meta_desc_ar" value="<?= e($page['meta_desc_ar'] ?? '') ?>" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-none"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Media & Publishing Status -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-4">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="size-9 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Üst Banner Görseli & Yayın Durumu</h3>
                    <p class="text-[11px] text-slate-400">Sayfa başlık alanında yer alacak görsel ve genel aktiflik</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Banner Görsel Yolu</label>
                    <input type="text" name="header_image" value="<?= e($page['header_image'] ?? '') ?>" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 bg-slate-50/50 font-mono text-slate-700" placeholder="assets/images/..."/>
                </div>

                <div class="flex items-center pt-4 sm:pt-0">
                    <label class="inline-flex items-center gap-3 cursor-pointer p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-all w-full">
                        <input type="checkbox" name="is_active" value="1" <?= $page['is_active'] ? 'checked' : '' ?> class="size-5 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500"/>
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">Sayfa Sitede Yayında Olsun</span>
                            <span class="text-[11px] text-slate-400">İşaretliyken menüde ve Google aramalarında aktif kalır.</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Sticky Bottom Bar -->
        <div class="p-4 bg-white/90 backdrop-blur-md rounded-2xl border border-slate-200/80 shadow-md flex items-center justify-between sticky bottom-6 z-20">
            <a href="<?= url('/podmin/pages') ?>" class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 transition-colors">Vazgeç</a>
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-emerald-600/20 transition-all hover:scale-105 active:scale-95 flex items-center gap-2 cursor-pointer">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span>Sayfa Değişikliklerini Kaydet</span>
            </button>
        </div>

    </form>
</div>

<script>
function switchPageLang(lang) {
    var tabs = ['tr', 'en', 'ar'];
    tabs.forEach(function(l) {
        var pane = document.getElementById('tab-page-' + l);
        var btn = document.getElementById('btn-page-' + l);
        if (l === lang) {
            if (pane) pane.classList.remove('hidden');
            if (btn) {
                btn.className = 'px-4 py-2 text-xs font-bold rounded-xl transition-all bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-xs';
            }
        } else {
            if (pane) pane.classList.add('hidden');
            if (btn) {
                btn.className = 'px-4 py-2 text-xs font-bold rounded-xl transition-all text-slate-600 hover:text-slate-900 hover:bg-slate-100';
            }
        }
    });
}
</script>
