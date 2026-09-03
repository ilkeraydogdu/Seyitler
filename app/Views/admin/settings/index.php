<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h2 class="text-xl font-bold text-slate-900">Site & İletişim Ayarları</h2>
        <p class="text-xs text-slate-500 mt-0.5">Tüm sitede ve altbilgide dinamik olarak kullanılan iletişim bilgilerini güncelleyin.</p>
    </div>

    <form action="<?= url('/admin/settings/update') ?>" method="POST" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
        <?= csrf_field() ?>

        <div class="space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">İletişim Bilgileri</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Şirket Telefonu</label>
                    <input type="text" name="company_phone" value="<?= e(site_setting('company_phone')) ?>" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kurumsal E-posta</label>
                    <input type="email" name="company_email" value="<?= e(site_setting('company_email')) ?>" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none font-mono"/>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Fabrika / Merkez Adresi</label>
                <textarea name="company_address" rows="2" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500/30 focus:border-brand-600 outline-none"><?= e(site_setting('company_address')) ?></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Google Harita / Navigasyon Bağlantısı</label>
                <input type="url" name="google_maps_url" value="<?= e(site_setting('google_maps_url')) ?>" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 font-mono"/>
            </div>
        </div>

        <div class="space-y-4 pt-6 border-t border-slate-100">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Sosyal Medya Hesapları</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">LinkedIn URL</label>
                    <input type="url" name="social_linkedin" value="<?= e(site_setting('social_linkedin')) ?>" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 font-mono"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Instagram URL</label>
                    <input type="url" name="social_instagram" value="<?= e(site_setting('social_instagram')) ?>" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 font-mono"/>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">X (Twitter) URL</label>
                    <input type="url" name="social_twitter" value="<?= e(site_setting('social_twitter')) ?>" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 font-mono"/>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-brand-600/30 transition-all cursor-pointer">
                Ayarları Kaydet
            </button>
        </div>
    </form>
</div>
