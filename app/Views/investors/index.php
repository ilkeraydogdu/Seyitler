<?php
$investorsJsonData = [];
foreach ($tree as $cat) {
    $catItem = [
        "id" => "cat_" . $cat["id"],
        "name" => \App\Models\InvestorCategory::getName($cat),
        "children" => [],
        "pdfs" => [],
        "is_iframe" => false,
        "iframe_url" => null,
    ];
    if (!empty($documentsGrouped[$cat["id"]])) {
        foreach ($documentsGrouped[$cat["id"]] as $d) {
            $catItem["pdfs"][] = [
                "label" => $d["label"],
                "url" => $d["url"],
            ];
        }
    }
    if (!empty($cat["children"])) {
        foreach ($cat["children"] as $sub) {
            $subItem = [
                "id" => "sub_" . $sub["id"],
                "name" => \App\Models\InvestorCategory::getName($sub),
                "pdfs" => [],
            ];
            if (!empty($documentsGrouped[$sub["id"]])) {
                foreach ($documentsGrouped[$sub["id"]] as $d) {
                    $subItem["pdfs"][] = [
                        "label" => $d["label"],
                        "url" => $d["url"],
                    ];
                }
            }
            $catItem["children"][] = $subItem;
        }
    }
    $investorsJsonData[] = $catItem;
}
?>

    <div>
        <!-- Breadcrumb Header -->
        <section class="relative bg-center bg-cover py-12">
            <div class="relative z-10 px-5 mx-auto xl:px-0 max-w-7xl">
                <nav class="flex items-center gap-2 mb-6 text-sm border-b py-4">
                    <span class="text-seyitler-primary text-2xl uppercase font-semibold"><?= e(!empty($page) ? \App\Models\Page::getTitle($page) : __('menu_investors', 'Yatırımcı İlişkileri')) ?></span>
                    <span class="text-seyitler-txt/50">
                        <svg class="lucide lucide-arrow-left-icon size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                    </span>
                    <a class="text-seyitler-txt/50 uppercase text-xs hover:text-seyitler-primary transition-colors" href="<?= url('/') ?>"><?= __('menu_home', 'Anasayfa') ?></a>
                </nav>
            </div>
        </section>

        <!-- Investors Layout with generous bottom spacing before footer -->
        <div class="mx-auto px-4 max-w-7xl pt-4 pb-20 xl:px-0" style="padding-bottom: 8rem; margin-bottom: 3rem;">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8" style="margin-bottom: 2rem;">
                
                <!-- Left Accordion Sidebar -->
                <aside class="md:col-span-4 lg:col-span-3">
                    <div id="investors-sidebar" class="flex flex-col border border-gray-100 rounded-xl overflow-hidden shadow-sm bg-white" style="margin-bottom: 2rem;">
                        <!-- Sidebar injected via JS -->
                    </div>
                </aside>

                <!-- Right Dynamic Content Area -->
                <div class="md:col-span-8 lg:col-span-9 flex flex-col gap-6 min-h-[60vh]">
                    <div class="mb-2">
                        <h2 id="active-panel-title" class="text-2xl font-bold text-gray-800 mb-1">Yatırımcı İlişkileri</h2>
                        <div class="h-1 w-20 bg-seyitler-primary rounded-full"></div>
                    </div>

                    <!-- Filter / Search (Optional for large document sets) -->
                    <div id="doc-search-wrapper" class="relative hidden">
                        <input id="doc-search-input" type="text" placeholder="Dökümanlarda ara..." class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-200 focus:outline-none focus:border-seyitler-primary transition-colors"/>
                    </div>

                    <!-- Documents Container -->
                    <div id="active-panel-content" class="grid grid-cols-1 gap-4" style="margin-bottom: 3rem;">
                        <!-- Documents list / iframe injected via JS -->
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>

const INVESTORS_DATA = <?= json_encode($investorsJsonData, JSON_UNESCAPED_UNICODE) ?>;

document.addEventListener('DOMContentLoaded', () => {
    const sidebarEl = document.getElementById('investors-sidebar');
    const titleEl = document.getElementById('active-panel-title');
    const contentEl = document.getElementById('active-panel-content');
    
    if (!sidebarEl || !INVESTORS_DATA) return;

    let activeCatIndex = 0;
    let activeSubIndex = 0;

    // Render Sidebar
    function renderSidebar() {
        let html = '';
        INVESTORS_DATA.forEach((cat, cIdx) => {
            const hasChildren = cat.children && cat.children.length > 0;
            const isCatActive = (activeCatIndex === cIdx);
            
            html += `
                <div class="category-block border-b border-gray-50 last:border-0">
                    <div class="cat-header group flex items-center justify-between px-4 py-3.5 cursor-pointer transition-all duration-200 hover:bg-gray-50 ${isCatActive && !hasChildren ? 'bg-seyitler-primary/5 text-seyitler-primary font-semibold border-l-4 border-l-seyitler-primary' : 'text-gray-700'}" data-cat-idx="${cIdx}">
                        <div class="flex items-center gap-3 overflow-hidden">
                            ${hasChildren ? `
                                <svg class="chevron-icon w-3.5 h-3.5 transition-transform duration-200 ${isCatActive ? 'rotate-90 text-seyitler-primary' : 'text-gray-400'}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"></path></svg>
                            ` : `
                                <span class="w-3.5 h-3.5"></span>
                            `}
                            <span class="text-[15px] font-medium leading-tight truncate">${cat.name}</span>
                        </div>
                    </div>
                    ${hasChildren ? `
                        <div class="sub-list flex flex-col bg-gray-50/50 ${isCatActive ? '' : 'hidden'}" id="sub-list-${cIdx}">
                            ${cat.children.map((sub, sIdx) => {
                                const isSubActive = (isCatActive && activeSubIndex === sIdx);
                                return `
                                    <div class="sub-item group flex items-center gap-3 py-2.5 pr-4 cursor-pointer transition-all duration-200 border-l-4 ${isSubActive ? 'bg-seyitler-primary/10 text-seyitler-primary font-semibold border-l-seyitler-primary' : 'border-l-transparent text-gray-600 hover:text-seyitler-primary hover:bg-gray-100/60'}" style="padding-left: 2.25rem;" data-cat-idx="${cIdx}" data-sub-idx="${sIdx}">
                                        <div class="w-1.5 h-1.5 rounded-full ${isSubActive ? 'bg-seyitler-primary' : 'bg-gray-300 group-hover:bg-seyitler-primary'}"></div>
                                        <span class="text-sm leading-tight">${sub.name}</span>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    ` : ''}
                </div>
            `;
        });
        sidebarEl.innerHTML = html;

        // Attach event listeners
        sidebarEl.querySelectorAll('.cat-header').forEach(el => {
            el.addEventListener('click', () => {
                const cIdx = parseInt(el.getAttribute('data-cat-idx'));
                const cat = INVESTORS_DATA[cIdx];
                if (cat.children && cat.children.length > 0) {
                    // Toggle expand
                    if (activeCatIndex === cIdx) {
                        const subList = document.getElementById(`sub-list-${cIdx}`);
                        const chevron = el.querySelector('.chevron-icon');
                        if (subList) {
                            subList.classList.toggle('hidden');
                            if (chevron) chevron.classList.toggle('rotate-90');
                        }
                    } else {
                        activeCatIndex = cIdx;
                        activeSubIndex = 0;
                        renderSidebar();
                        renderContent();
                    }
                } else {
                    activeCatIndex = cIdx;
                    activeSubIndex = 0;
                    renderSidebar();
                    renderContent();
                }
            });
        });

        sidebarEl.querySelectorAll('.sub-item').forEach(el => {
            el.addEventListener('click', (e) => {
                e.stopPropagation();
                activeCatIndex = parseInt(el.getAttribute('data-cat-idx'));
                activeSubIndex = parseInt(el.getAttribute('data-sub-idx'));
                renderSidebar();
                renderContent();
            });
        });
    }

    // Render Right Panel Content
    function renderContent() {
        const cat = INVESTORS_DATA[activeCatIndex];
        if (!cat) return;

        let title = cat.name;
        let pdfs = cat.pdfs || [];
        let isIframe = cat.is_iframe;

        if (cat.children && cat.children.length > 0) {
            const sub = cat.children[activeSubIndex] || cat.children[0];
            title = sub.name;
            pdfs = sub.pdfs || [];
        }

        titleEl.textContent = title;

        if (isIframe && cat.iframe_url) {
            contentEl.innerHTML = `
                <div class="w-full bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                    <iframe src="${cat.iframe_url}" class="w-full h-[800px] border-0" title="${title}"></iframe>
                </div>
            `;
            return;
        }

        if (!pdfs || pdfs.length === 0) {
            contentEl.innerHTML = `
                <div class="p-12 text-center bg-gray-50 border border-gray-100 rounded-xl">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p class="text-gray-500 font-medium"><?= __('no_documents_in_category', 'Bu kategori altında döküman bulunmamaktadır.') ?></p>
                </div>
            `;
            return;
        }

        let docsHtml = '';
        pdfs.forEach(doc => {
            docsHtml += `
                <a class="group flex items-center justify-between p-4 bg-white border border-gray-100 rounded-xl hover:border-seyitler-primary/30 hover:shadow-md transition-all duration-300" href="${doc.url}" target="_blank" rel="noopener noreferrer">
                    <div class="flex items-center gap-4 overflow-hidden">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-50 text-red-500 rounded-lg flex items-center justify-center group-hover:bg-red-500 group-hover:text-white transition-colors duration-300">
                            <svg class="lucide lucide-file-text-icon w-6 h-6" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-gray-800 font-medium truncate pr-4 group-hover:text-seyitler-primary transition-colors">${doc.label}</span>
                            <span class="text-gray-400 text-xs uppercase tracking-wider">PDF Dokümanı</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-400 group-hover:bg-seyitler-primary group-hover:text-white transition-all duration-300 shadow-sm" title="İndir">
                        <svg class="lucide lucide-download-icon w-5 h-5" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" x2="12" y1="15" y2="3"></line></svg>
                    </div>
                </a>
            `;
        });
        contentEl.innerHTML = docsHtml;
        if (typeof translateDom === 'function' && typeof getCurrentLanguage === 'function') {
            translateDom(getCurrentLanguage());
        }
    }

    // Initial render
    renderSidebar();
    renderContent();
    if (typeof translateDom === 'function' && typeof getCurrentLanguage === 'function') {
        translateDom(getCurrentLanguage());
    }
});

</script>