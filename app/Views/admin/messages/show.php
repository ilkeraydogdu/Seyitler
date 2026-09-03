<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Mesaj Detayı</h2>
            <p class="text-xs text-slate-500 mt-0.5"><?= date('d.m.Y H:i', strtotime($message['created_at'])) ?> tarihinde gönderildi.</p>
        </div>
        <a href="<?= url('/admin/messages') ?>" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl transition-colors">
            Gelen Kutusuna Dön
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-slate-100">
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Gönderen</span>
                <div class="text-base font-bold text-slate-900 mt-0.5"><?= e($message['name']) ?></div>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">E-posta</span>
                <div class="text-sm font-semibold text-slate-900 mt-0.5">
                    <a href="mailto:<?= e($message['email']) ?>" class="text-brand-600 hover:underline"><?= e($message['email']) ?></a>
                </div>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Telefon</span>
                <div class="text-sm font-semibold text-slate-900 mt-0.5">
                    <?= e($message['phone'] ?: 'Belirtilmedi') ?>
                </div>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Konu</span>
                <div class="text-sm font-semibold text-slate-900 mt-0.5">
                    <?= e($message['subject'] ?: 'Belirtilmedi') ?>
                </div>
            </div>
        </div>

        <div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mesaj İçeriği</span>
            <div class="mt-2 p-5 bg-slate-50 rounded-xl border border-slate-200 text-sm leading-relaxed text-slate-800 whitespace-pre-wrap">
                <?= e($message['message']) ?>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
            <a href="mailto:<?= e($message['email']) ?>?subject=RE: <?= urlencode($message['subject'] ?: 'Seyitler Kimya İletişim') ?>" class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-md transition-all inline-flex items-center gap-2">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3"/></svg>
                <span>E-posta İle Yanıtla</span>
            </a>

            <form action="<?= url('/admin/messages/delete/' . $message['id']) ?>" method="POST" onsubmit="return confirm('Bu mesajı silmek istediğinize emin misiniz?');">
                <?= csrf_field() ?>
                <button type="submit" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold rounded-xl transition-colors cursor-pointer">
                    Mesajı Sil
                </button>
            </form>
        </div>
    </div>
</div>
