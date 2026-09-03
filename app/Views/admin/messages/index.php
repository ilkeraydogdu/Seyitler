<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Gelen Mesajlar</h2>
            <p class="text-xs text-slate-500 mt-0.5">Web sitesi iletişim formundan gelen müşteri ve iş ortaklığı talepleri.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-slate-50 text-slate-600 uppercase font-extrabold tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4 w-12 text-center">Durum</th>
                        <th class="py-3.5 px-4">Gönderen</th>
                        <th class="py-3.5 px-4">İletişim</th>
                        <th class="py-3.5 px-4">Konu / Mesaj</th>
                        <th class="py-3.5 px-4 text-center">Tarih</th>
                        <th class="py-3.5 px-4 text-right">İşlem</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (empty($messages)): ?>
                        <tr><td colspan="6" class="py-8 text-center text-slate-400 font-medium">Henüz gelen mesaj yok.</td></tr>
                    <?php else: ?>
                        <?php foreach ($messages as $m): ?>
                            <tr class="hover:bg-slate-50 transition-colors <?= empty($m['is_read']) ? 'bg-emerald-50/40 font-semibold' : '' ?>">
                                <td class="py-3 px-4 text-center">
                                    <?php if (empty($m['is_read'])): ?>
                                        <span class="size-2.5 rounded-full bg-rose-500 inline-block" title="Okunmadı"></span>
                                    <?php else: ?>
                                        <span class="size-2.5 rounded-full bg-slate-300 inline-block" title="Okundu"></span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="font-bold text-slate-900"><?= e($m['name']) ?></div>
                                </td>
                                <td class="py-3 px-4 space-y-0.5">
                                    <div class="text-slate-600 font-mono text-[11px]"><?= e($m['email']) ?></div>
                                    <div class="text-slate-400 text-[10px]"><?= e($m['phone'] ?: '-') ?></div>
                                </td>
                                <td class="py-3 px-4 max-w-xs truncate">
                                    <div class="font-bold text-slate-800 truncate"><?= e($m['subject'] ?: 'Konusuz') ?></div>
                                    <div class="text-slate-500 text-[11px] truncate font-normal"><?= e($m['message']) ?></div>
                                </td>
                                <td class="py-3 px-4 text-center text-[11px] text-slate-400 whitespace-nowrap">
                                    <?= date('d.m.Y H:i', strtotime($m['created_at'])) ?>
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= url('/admin/messages/' . $m['id']) ?>" class="px-3 py-1.5 bg-brand-50 hover:bg-brand-100 text-brand-700 rounded-lg text-xs font-bold transition-colors">
                                            Görüntüle
                                        </a>
                                        <form action="<?= url('/admin/messages/delete/' . $m['id']) ?>" method="POST" onsubmit="return confirm('Bu mesajı silmek istediğinize emin misiniz?');" class="inline">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 cursor-pointer" title="Sil">
                                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
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
