<section class="py-24 sm:py-32 flex items-center justify-center text-center">
    <div class="max-w-xl mx-auto px-4">
        <div class="size-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm border border-blue-100">
            <svg class="size-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
        </div>
        <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Çok Fazla İstek (Rate Limit)</h1>
        <p class="mt-4 text-sm sm:text-base text-slate-500 leading-relaxed">
            Kısa süre içerisinde sistem güvenliği sınırlarını aşan istek tespit edildi. Güvenliğiniz için bağlantınız geçici olarak beklemeye alındı. Lütfen birkaç dakika sonra tekrar deneyiniz.
        </p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="<?= url('/') ?>" class="px-6 py-3 bg-seyitler-primary hover:bg-seyitler-primary/90 text-white font-semibold text-xs sm:text-sm uppercase tracking-wider rounded-lg shadow-sm transition-all">
                Anasayfaya Dön
            </a>
        </div>
    </div>
</section>
