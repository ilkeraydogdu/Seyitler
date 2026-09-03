<?php
/** @var array $messages */
?>

<div class="space-y-6 max-w-6xl mx-auto pb-16">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-wider mb-1">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Müşteri & Bayi Talepleri</span>
            </div>
            <h1 class="text-2xl font-bold font-display text-slate-900 tracking-tight">Gelen Mesajlar & İletişim Kutusu</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Web sitesi iletişim formundan gelen teklif talepleri, kurumsal sorular ve bayi başvuruları.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-extrabold border border-slate-200/60">
                <?= count($messages) ?> Toplam Talep
            </span>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50/80 text-slate-500 uppercase font-extrabold tracking-wider border-b border-slate-200/80">
                    <tr>
                        <th class="py-4 px-4 w-12 text-center">Durum</th>
                        <th class="py-4 px-4">Gönderen Kişi / Kurum</th>
                        <th class="py-4 px-4">İletişim Kanalı</th>
                        <th class="py-4 px-4">Konu ve Önizleme</th>
                        <th class="py-4 px-4 text-center">Tarih</th>
                        <th class="py-4 px-4 text-right">İşlem</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (empty($messages)): ?>
                        <tr>
                            <td colspan="6" class="py-16 text-center">
                                <div class="size-14 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                                    <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                                </div>
                                <h4 class="font-bold text-slate-800 text-sm">Gelen Kutusu Boş</h4>
                                <p class="text-xs text-slate-400 mt-1">Web sitesinden iletilen yeni mesajlar burada görüntülenecektir.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($messages as $m): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors <?= empty($m['is_read']) ? 'bg-emerald-50/30' : '' ?> group">
                                <td class="py-4 px-4 text-center">
                                    <?php if (empty($m['is_read'])): ?>
                                        <span class="size-2.5 rounded-full bg-rose-500 inline-block shadow-sm shadow-rose-500/50 animate-pulse" title="Okunmamış Yeni Mesaj"></span>
                                    <?php else: ?>
                                        <span class="size-2 rounded-full bg-slate-300 inline-block" title="Okundu"></span>
                                    <?php endif; ?>
                                </td>
                                
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-xl <?= empty($m['is_read']) ? 'bg-emerald-100 text-emerald-800 font-extrabold' : 'bg-slate-100 text-slate-600' ?> flex items-center justify-center text-xs shrink-0">
                                            <?= strtoupper(substr($m['name'] ?? 'M', 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900 group-hover:text-emerald-700 transition-colors"><?= e($m['name']) ?></div>
                                            <?php if (empty($m['is_read'])): ?>
                                                <span class="text-[9px] font-extrabold px-1.5 py-0.2 rounded bg-rose-500 text-white shadow-2xs">YENİ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-4 space-y-0.5">
                                    <div class="text-slate-700 font-mono text-[11px] font-semibold"><?= e($m['email']) ?></div>
                                    <div class="text-slate-400 text-[10px]"><?= e($m['phone'] ?: 'Telefon yok') ?></div>
                                </td>

                                <td class="py-4 px-4 max-w-sm truncate">
                                    <div class="font-bold text-slate-800 truncate"><?= e($m['subject'] ?: 'Konusuz İletişim Formu') ?></div>
                                    <div class="text-slate-500 text-[11px] truncate font-normal mt-0.5"><?= e($m['message']) ?></div>
                                </td>

                                <td class="py-4 px-4 text-center text-[11px] text-slate-400 font-medium whitespace-nowrap">
                                    <?= date('d.m.Y H:i', strtotime($m['created_at'])) ?>
                                </td>

                                <td class="py-4 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                         <a href="<?= url('/podmin/messages/' . $m['id']) ?>" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 rounded-xl text-xs font-bold transition-all border border-emerald-200/60 shadow-2xs inline-flex items-center gap-1">
                                             <svg class="size-3.5 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                             <span>İncele</span>
                                         </a>
                                         <form action="<?= url('/podmin/messages/delete/' . $m['id']) ?>" method="POST" data-delete-form class="inline-block m-0 p-0">
                                             <?= csrf_field() ?>
                                             <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 hover:text-rose-700 rounded-xl text-xs font-bold transition-all border border-rose-200/60 shadow-2xs inline-flex items-center gap-1 cursor-pointer" title="Mesajı Sil">
                                                 <svg class="size-3.5 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                                 <span>Sil</span>
                                             </button>
                                         </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('form[data-delete-form]').forEach(form => {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const confirmed = typeof AdminDialog !== 'undefined'
            ? await AdminDialog.confirm({
                title: 'Mesajı Kalıcı Olarak Sil',
                message: 'Bu iletişim talebini kalıcı olarak silmek istediğinize emin misiniz? Bu işlem geri alınamaz.',
                confirmText: 'Evet, Sil',
                cancelText: 'Vazgeç',
                type: 'danger'
            })
            : true;

        if (!confirmed) {
            return;
        }
        
        const btn = this.querySelector('button[type="submit"]');
        const tr = this.closest('tr');
        if (btn) {
            btn.disabled = true;
            btn.classList.add('opacity-50');
        }

        try {
            const formData = new FormData(this);
            const res = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
            const data = await res.json();
            if (data.success) {
                if (typeof AdminDialog !== 'undefined') {
                    AdminDialog.toast({
                        title: 'Başarılı',
                        message: data.message || 'İletişim mesajı başarıyla silindi.',
                        type: 'success'
                    });
                }
                if (tr) {
                    tr.style.transition = 'all 0.3s ease';
                    tr.style.opacity = '0';
                    tr.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        tr.remove();
                    }, 300);
                }
            } else {
                if (typeof AdminDialog !== 'undefined') {
                    AdminDialog.toast({
                        title: 'Hata',
                        message: data.message || 'Silme işlemi gerçekleştirilemedi.',
                        type: 'error'
                    });
                }
                if (btn) {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                }
            }
        } catch (err) {
            this.submit();
        }
    });
});
</script>
