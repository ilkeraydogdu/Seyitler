<?php
/** @var array $message */
?>

<div class="max-w-4xl mx-auto space-y-6 pb-16">
    
    <!-- Top Bar -->
    <div class="flex items-center justify-between pb-2 border-b border-slate-200/80">
        <div class="flex items-center gap-3">
            <a href="<?= url('/podmin/messages') ?>" class="p-2 text-slate-400 hover:text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors shadow-2xs">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-0.5">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    <span>Talep Detayı</span>
                </div>
                <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Mesaj İnceleme</h1>
                <p class="text-xs text-slate-400 mt-0.5"><?= date('d.m.Y - H:i', strtotime($message['created_at'])) ?> tarihinde iletildi</p>
            </div>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <a href="mailto:<?= e($message['email']) ?>?subject=RE: <?= urlencode($message['subject'] ?: 'Seyitler Kimya İletişim Talebi') ?>" class="px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-brand-600 hover:from-emerald-700 hover:to-brand-700 text-white text-xs font-bold rounded-xl shadow-md shadow-emerald-600/20 transition-all flex items-center gap-2">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3"/></svg>
                <span>E-posta İle Yanıtla</span>
            </a>
        </div>
    </div>

    <!-- Message Body Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle p-6 sm:p-8 space-y-6">
        
        <!-- Contact Meta Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/60">
            <div>
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Gönderen</span>
                <div class="text-sm font-bold text-slate-900 mt-1"><?= e($message['name']) ?></div>
            </div>
            <div>
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">E-posta Adresi</span>
                <div class="text-xs font-semibold text-slate-900 mt-1 font-mono">
                    <a href="mailto:<?= e($message['email']) ?>" class="text-emerald-700 hover:underline"><?= e($message['email']) ?></a>
                </div>
            </div>
            <div>
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Telefon Numarası</span>
                <div class="text-xs font-semibold text-slate-900 mt-1 font-mono">
                    <?= e($message['phone'] ?: 'Belirtilmedi') ?>
                </div>
            </div>
            <div>
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Mesaj Konusu</span>
                <div class="text-xs font-bold text-slate-900 mt-1 truncate">
                    <?= e($message['subject'] ?: 'Belirtilmedi') ?>
                </div>
            </div>
        </div>

        <!-- Full Message Content -->
        <div>
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Mesaj İçeriği</span>
            <div class="mt-2.5 p-6 rounded-2xl bg-slate-50 border border-slate-200/80 text-sm leading-relaxed text-slate-800 whitespace-pre-wrap font-sans select-text">
                <?= e($message['message']) ?>
            </div>
        </div>

        <!-- Bottom Actions -->
        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
            <a href="<?= url('/podmin/messages') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors flex items-center gap-1.5">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                <span>Gelen Kutusuna Dön</span>
            </a>

            <form action="<?= url('/podmin/messages/delete/' . $message['id']) ?>" method="POST" class="inline-block m-0 p-0">
                <?= csrf_field() ?>
                <button type="submit" onclick="return confirm('Bu mesajı kalıcı olarak silmek istediğinize emin misiniz?');" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold rounded-xl transition-all border border-rose-200/60 cursor-pointer flex items-center gap-1.5 shadow-2xs">
                    <svg class="size-4 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                    <span>Mesajı Sil</span>
                </button>
            </form>
        </div>

    </div>
</div>
