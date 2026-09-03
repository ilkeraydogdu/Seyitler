<?php
use App\Models\InvestorCategory;
use App\Models\InvestorDocument;

/** @var array $tree */
/** @var array $documentsGrouped */
?>

<!-- Breadcrumb Header -->
<section class="relative bg-center bg-cover py-10 bg-gray-50 border-b border-gray-100">
    <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-gray-400 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('ANASAYFA', 'Anasayfa') ?></a>
            <span class="text-gray-400">/</span>
            <span class="text-seyitler-primary text-base font-semibold uppercase"><?= __('Yatırımcı İlişkileri', 'Yatırımcı İlişkileri') ?></span>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mt-2"><?= __('Yatırımcı İlişkileri Portalı', 'Yatırımcı İlişkileri Portalı') ?></h1>
    </div>
</section>

<div class="py-12 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        
        <!-- Left Categories Sidebar -->
        <aside class="md:col-span-4 lg:col-span-3">
            <div id="investors-sidebar" class="sticky top-24 flex flex-col border border-gray-200 rounded-xl overflow-hidden shadow-sm bg-white">
                <?php foreach ($tree as $cIdx => $cat): ?>
                    <?php 
                    $catName = InvestorCategory::getName($cat); 
                    $hasChildren = !empty($cat['children']);
                    ?>
                    <div class="category-block border-b border-gray-100 last:border-0">
                        <div class="cat-header flex items-center justify-between px-4 py-3.5 cursor-pointer hover:bg-gray-50 transition-colors <?= $cIdx === 0 && !$hasChildren ? 'bg-emerald-50 text-seyitler-primary font-bold border-l-4 border-l-seyitler-primary' : 'text-gray-800' ?>" data-cat-id="<?= $cat['id'] ?>">
                            <div class="flex items-center gap-2.5 overflow-hidden">
                                <?php if ($hasChildren): ?>
                                    <svg class="chevron-icon size-3.5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                                <?php else: ?>
                                    <span class="size-3.5"></span>
                                <?php endif; ?>
                                <span class="text-sm font-semibold truncate"><?= e($catName) ?></span>
                            </div>
                        </div>

                        <?php if ($hasChildren): ?>
                            <div class="sub-list flex flex-col bg-gray-50/70 <?= $cIdx === 0 ? '' : 'hidden' ?>" id="sub-list-<?= $cat['id'] ?>">
                                <?php foreach ($cat['children'] as $sIdx => $sub): ?>
                                    <?php $subName = InvestorCategory::getName($sub); ?>
                                    <div class="sub-item flex items-center gap-2.5 py-2.5 pl-9 pr-4 cursor-pointer text-xs font-medium text-gray-600 hover:text-seyitler-primary hover:bg-gray-100/70 transition-colors border-l-4 <?= ($cIdx === 0 && $sIdx === 0) ? 'border-l-seyitler-primary bg-emerald-50/80 text-seyitler-primary font-bold' : 'border-l-transparent' ?>" data-sub-id="<?= $sub['id'] ?>" data-sub-name="<?= e($subName) ?>" data-iframe="<?= $sub['is_iframe'] ? '1' : '0' ?>" data-iframe-url="<?= e($sub['iframe_url'] ?? '') ?>">
                                        <span class="size-1.5 rounded-full bg-gray-400"></span>
                                        <span class="truncate"><?= e($subName) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- Right Content Area -->
        <div class="md:col-span-8 lg:col-span-9 flex flex-col gap-6 min-h-[60vh]">
            <div class="border-b border-gray-200 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 id="active-panel-title" class="text-2xl font-bold text-gray-900"><?= __('Şirket Bilgileri', 'Şirket Bilgileri') ?></h2>
                    <div class="h-1 w-16 bg-seyitler-primary rounded-full mt-2"></div>
                </div>

                <!-- Document Search -->
                <div class="relative w-full sm:w-64">
                    <input id="doc-search-input" type="text" placeholder="<?= __('Dökümanlarda ara...', 'Dökümanlarda ara...') ?>" class="w-full px-3.5 py-2 text-xs rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-seyitler-primary/40 focus:border-seyitler-primary transition-all"/>
                    <svg class="size-4 text-gray-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                </div>
            </div>

            <!-- Documents List Container -->
            <div id="active-panel-content" class="grid grid-cols-1 gap-3">
                <!-- Javascript will populate documents based on selected category -->
            </div>
        </div>

    </div>
</div>

<script>
const DOCUMENTS_MAP = <?= json_encode($documentsGrouped, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('investors-sidebar');
    const titleEl = document.getElementById('active-panel-title');
    const contentEl = document.getElementById('active-panel-content');
    const searchInput = document.getElementById('doc-search-input');

    if (!sidebar || !contentEl) return;

    let currentDocs = [];

    function renderDocs(docs) {
        if (!docs || docs.length === 0) {
            contentEl.innerHTML = `
                <div class="text-center py-16 bg-gray-50 rounded-xl border border-gray-200">
                    <svg class="size-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    <p class="text-sm font-medium text-gray-500">Bu kategori altında döküman bulunmuyor.</p>
                </div>
            `;
            return;
        }

        let html = '';
        docs.forEach(doc => {
            const url = '<?= asset('') ?>' + doc.url.replace(/^\/+/, '');
            html += `
                <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-seyitler-primary/40 hover:shadow-md transition-all group">
                    <div class="flex items-center gap-3.5 overflow-hidden">
                        <div class="size-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                            <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm5.5 0h-1v-2h1c.55 0 1 .45 1 1s-.45 1-1 1zm-4-4.5h-2.5v7H10V11h1c1.1 0 2-.9 2-2s-.9-2-2-2zm5 0h-2.5v7H15V11h1c1.1 0 2-.9 2-2s-.9-2-2-2z"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-800 group-hover:text-seyitler-primary transition-colors truncate">
                            ${doc.label}
                        </span>
                    </div>
                    <a href="${url}" target="_blank" rel="noopener noreferrer" class="px-4 py-2 bg-gray-50 hover:bg-seyitler-primary hover:text-white text-gray-700 text-xs font-semibold rounded-lg transition-all flex items-center gap-1.5 shrink-0 border border-gray-200 hover:border-transparent">
                        <span>Görüntüle</span>
                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                    </a>
                </div>
            `;
        });
        contentEl.innerHTML = html;
    }

    function selectCategory(catId, catName) {
        if (titleEl) titleEl.textContent = catName;
        currentDocs = DOCUMENTS_MAP[catId] || [];
        renderDocs(currentDocs);
        if (searchInput) searchInput.value = '';
    }

    // Event Delegation for Sidebar clicks
    sidebar.addEventListener('click', (e) => {
        const subItem = e.target.closest('.sub-item');
        if (subItem) {
            document.querySelectorAll('.sub-item').forEach(el => {
                el.classList.remove('border-l-seyitler-primary', 'bg-emerald-50/80', 'text-seyitler-primary', 'font-bold');
                el.classList.add('border-l-transparent');
            });
            subItem.classList.add('border-l-seyitler-primary', 'bg-emerald-50/80', 'text-seyitler-primary', 'font-bold');
            subItem.classList.remove('border-l-transparent');

            const subId = subItem.getAttribute('data-sub-id');
            const subName = subItem.getAttribute('data-sub-name');
            selectCategory(subId, subName);
            return;
        }

        const catHeader = e.target.closest('.cat-header');
        if (catHeader) {
            const catId = catHeader.getAttribute('data-cat-id');
            const subList = document.getElementById('sub-list-' + catId);
            const chevron = catHeader.querySelector('.chevron-icon');

            if (subList) {
                const isHidden = subList.classList.contains('hidden');
                document.querySelectorAll('.sub-list').forEach(sl => sl.classList.add('hidden'));
                document.querySelectorAll('.chevron-icon').forEach(ch => ch.classList.remove('rotate-90'));

                if (isHidden) {
                    subList.classList.remove('hidden');
                    if (chevron) chevron.classList.add('rotate-90');
                    // İlk alt elemanı seç
                    const firstSub = subList.querySelector('.sub-item');
                    if (firstSub) firstSub.click();
                }
            } else {
                // Alt kategorisi olmayan ana kategori
                const catName = catHeader.querySelector('span.text-sm').textContent;
                selectCategory(catId, catName);
            }
        }
    });

    // Search filtering
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase().trim();
            if (!term) {
                renderDocs(currentDocs);
                return;
            }
            const filtered = currentDocs.filter(d => d.label.toLowerCase().includes(term));
            renderDocs(filtered);
        });
    }

    // Sayfa açıldığında ilk alt kategoriyi yükle
    const firstSubItem = sidebar.querySelector('.sub-item');
    if (firstSubItem) {
        firstSubItem.click();
    }
});
</script>
