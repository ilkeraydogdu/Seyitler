/**
 * Seyitler Kimya - Standalone JavaScript Bundle
 * Pure Vanilla JS without Nuxt/Vue dependencies
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Drawer
    initMobileMenu();

    // 2. Swiper Carousels Initialization
    initSwipers();

    // 3. Dropdowns & Submenus
    initDropdowns();

    // 4. Accordions & General Tabs
    initAccordions();

    // 5. Product Detail Tabs (Özellikler & Tablo)
    initProductTabs();

    // 6. Product Detail Gallery & Image Preview (Arrows, Drag, Click)
    initProductGalleries();

    // 7. Sticky Header Scroll Effects
    initStickyHeader();

    // 8. Homepage Category Filter Tabs
    initHomepageCategoryTabs();

    // 9. Topbar Language Dropdown Toggle
    initLanguageDropdown();
});

function initMobileMenu() {
    const mobileBtn = document.querySelector('button[name="mobile"]') || document.querySelector('header button.lg\\:hidden');
    if (!mobileBtn) return;

    let drawer = document.getElementById('mobile-drawer');
    if (!drawer) {
        const isSubdir = window.location.pathname.includes('/products/') || window.location.pathname.includes('/about-us/');
        const prefix = isSubdir ? '../' : '';

        drawer = document.createElement('div');
        drawer.id = 'mobile-drawer';
        drawer.className = 'fixed inset-0 z-[100] hidden';
        drawer.innerHTML = `
            <div id="mobile-drawer-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>
            <div id="mobile-drawer-panel" class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-2xl p-6 flex flex-col justify-between transform translate-x-full transition-transform duration-300 ease-in-out">
                <div>
                    <div class="flex items-center justify-between pb-6 border-b border-gray-100">
                        <a href="${prefix}index.html" class="flex items-center">
                            <img src="${prefix}assets/images/seyitler_yatay_logo.png" alt="Seyitler Kimya" class="h-10 w-auto" />
                        </a>
                        <button id="mobile-drawer-close" class="p-2 text-gray-500 hover:text-[#0AA64D] rounded-md transition-colors" aria-label="Kapat">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <nav class="mt-6 flex flex-col space-y-2">
                        <a href="${prefix}index.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">ANASAYFA</a>
                        <a href="${prefix}about-us.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">KURUMSAL</a>
                        <a href="${prefix}products.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">ÜRÜNLER</a>
                        <a href="${prefix}investors.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">YATIRIMCI İLİŞKİLERİ</a>
                        <a href="${prefix}rd.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">AR-GE VE İNOVASYON</a>
                        <a href="${prefix}areas.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">FAALİYET ALANLARI</a>
                        <a href="${prefix}contact.html" class="px-4 py-3 rounded-md text-sm font-semibold tracking-wider text-gray-700 hover:bg-emerald-50 hover:text-[#0AA64D] transition-colors">İLETİŞİM</a>
                    </nav>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-center gap-3 text-xs font-semibold">
                        <button onclick="setLanguage('tr')" class="px-3 py-1.5 rounded-md border border-gray-200 hover:border-seyitler-primary hover:text-seyitler-primary transition-colors cursor-pointer">Türkçe (TR)</button>
                        <button onclick="setLanguage('en')" class="px-3 py-1.5 rounded-md border border-gray-200 hover:border-seyitler-primary hover:text-seyitler-primary transition-colors cursor-pointer">English (EN)</button>
                        <button onclick="setLanguage('ar')" class="px-3 py-1.5 rounded-md border border-gray-200 hover:border-seyitler-primary hover:text-seyitler-primary transition-colors cursor-pointer">العربية (AR)</button>
                    </div>
                </div>
                <div class="pt-6 border-t border-gray-100 text-xs text-gray-400 text-center">
                    &copy; ${new Date().getFullYear()} Seyitler Kimya San. A.Ş.
                </div>
            </div>
        `;
        document.body.appendChild(drawer);
    }

    const backdrop = document.getElementById('mobile-drawer-backdrop');
    const panel = document.getElementById('mobile-drawer-panel');
    const closeBtn = document.getElementById('mobile-drawer-close');

    function openDrawer() {
        drawer.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            panel.classList.remove('translate-x-full');
            panel.classList.add('translate-x-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        setTimeout(() => {
            drawer.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    mobileBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);
}

function initSwipers() {
    if (typeof Swiper === 'undefined') return;

    // 1. Hero Swiper (Homepage only)
    const heroEl = document.querySelector('.hero-swiper') || document.querySelector('#hero-swiper') || (document.querySelector('.grid-cols-3 .bg-seyitler-primary') ? document.querySelector('.swiper') : null);
    if (heroEl) {
        const heroTabs = document.querySelectorAll('.grid-cols-1.md\\:grid-cols-3 > div.cursor-pointer, .grid.grid-cols-3.text-white > div.p-8');
        const heroSwiper = new Swiper(heroEl, {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            effect: 'slide',
            on: {
                slideChange: function () {
                    if (heroTabs && heroTabs.length > 0) {
                        const realIdx = this.realIndex % heroTabs.length;
                        heroTabs.forEach((tab, idx) => {
                            if (idx === realIdx) {
                                tab.style.opacity = '1';
                                tab.classList.add('ring-2', 'ring-white/40');
                            } else {
                                tab.style.opacity = '0.75';
                                tab.classList.remove('ring-2', 'ring-white/40');
                            }
                        });
                    }
                }
            }
        });

        if (heroTabs && heroTabs.length > 0) {
            heroTabs.forEach((tab, idx) => {
                tab.addEventListener('click', () => {
                    heroSwiper.slideToLoop(idx);
                });
            });
        }
    }

    // 2. R&D & Photo Gallery Carousels (.gallery-swiper, .swiper.px-4)
    const gallerySwipers = document.querySelectorAll('.gallery-swiper, .swiper.px-4');
    gallerySwipers.forEach(el => {
        new Swiper(el, {
            slidesPerView: 'auto',
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            speed: 800,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            }
        });
    });

    // 3. Products Swiper (#home-products-swiper)
    const homeProdEl = document.querySelector('#home-products-swiper, .home-products-swiper');
    if (homeProdEl) {
        new Swiper(homeProdEl, {
            slidesPerView: 'auto',
            spaceBetween: 24,
            grabCursor: true,
            speed: 600,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            }
        });
    }

    // 4. News & Other Multi-slide Swipers
    const otherSwipers = document.querySelectorAll('.swiper.w-full:not(.gallery-swiper):not(#home-products-swiper):not(.home-products-swiper)');
    otherSwipers.forEach((el, index) => {
        new Swiper(el, {
            slidesPerView: 'auto',
            spaceBetween: 24,
            loop: true,
            grabCursor: true,
            speed: 600,
            autoplay: {
                delay: 3500 + index * 500,
                disableOnInteraction: false,
            }
        });
    });
}

function initDropdowns() {
    const dropdownGroups = document.querySelectorAll('.group.relative');
    dropdownGroups.forEach(grp => {
        const menu = grp.querySelector('.group-hover\\:block, [class*="opacity-0"]');
        if (menu) {
            grp.addEventListener('mouseenter', () => {
                menu.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
            });
            grp.addEventListener('mouseleave', () => {
                menu.classList.add('hidden', 'opacity-0', 'pointer-events-none');
            });
        }
    });
}

function initAccordions() {
    const accordions = document.querySelectorAll('[data-accordion-trigger], .cursor-pointer.border-b');
    accordions.forEach(acc => {
        acc.addEventListener('click', () => {
            const content = acc.nextElementSibling;
            if (content && content.classList.contains('accordion-content')) {
                content.classList.toggle('hidden');
            }
        });
    });
}

/**
 * 5. Product Detail Tabs: "Özellikler" & "Tablo" switching
 */
function initProductTabs() {
    const btnFeatures = document.getElementById('tab-btn-features');
    const btnTable = document.getElementById('tab-btn-table');
    const contentFeatures = document.getElementById('tab-features-content');
    const contentTable = document.getElementById('tab-table-content');

    if (!btnFeatures || !btnTable || !contentFeatures || !contentTable) return;

    const activeClasses = ['text-seyitler-primary', 'after:absolute', 'after:bottom-0', 'after:left-0', 'after:right-0', 'after:h-0.5', 'after:bg-seyitler-primary'];
    const inactiveClasses = ['text-gray-500', 'hover:text-gray-700'];

    btnFeatures.addEventListener('click', () => {
        contentFeatures.classList.remove('hidden');
        contentTable.classList.add('hidden');

        activeClasses.forEach(c => btnFeatures.classList.add(c));
        inactiveClasses.forEach(c => btnFeatures.classList.remove(c));

        activeClasses.forEach(c => btnTable.classList.remove(c));
        inactiveClasses.forEach(c => btnTable.classList.add(c));
    });

    btnTable.addEventListener('click', () => {
        contentTable.classList.remove('hidden');
        contentFeatures.classList.add('hidden');

        activeClasses.forEach(c => btnTable.classList.add(c));
        inactiveClasses.forEach(c => btnTable.classList.remove(c));

        activeClasses.forEach(c => btnFeatures.classList.remove(c));
        inactiveClasses.forEach(c => btnFeatures.classList.add(c));
    });
}

/**
 * 6. Product Detail Gallery & Image Preview (Full Interaction: Arrows, Drag, Click)
 */
function initProductGalleries() {
    const mainImg = document.getElementById('main-product-img');
    const thumbBtns = document.querySelectorAll('.product-thumb-btn');
    const thumbsList = document.getElementById('product-thumbnails-list');
    
    const prevMainBtn = document.getElementById('main-img-prev-btn');
    const nextMainBtn = document.getElementById('main-img-next-btn');
    const prevThumbBtn = document.getElementById('thumb-prev-btn');
    const nextThumbBtn = document.getElementById('thumb-next-btn');

    if (!mainImg || thumbBtns.length === 0) return;

    let currentIndex = 0;
    const totalImages = thumbBtns.length;

    function setActiveImage(index) {
        if (index < 0) index = totalImages - 1;
        if (index >= totalImages) index = 0;
        currentIndex = index;

        const activeBtn = thumbBtns[currentIndex];
        const newSrc = activeBtn ? activeBtn.getAttribute('data-img-src') : null;

        if (newSrc) {
            mainImg.style.opacity = '0.3';
            setTimeout(() => {
                mainImg.src = newSrc;
                mainImg.style.opacity = '1';
            }, 120);
        }

        // Highlight active thumbnail
        thumbBtns.forEach((b, idx) => {
            if (idx === currentIndex) {
                b.classList.add('border-seyitler-primary');
                b.classList.remove('border-gray-200');
                // Ensure visible in strip
                b.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            } else {
                b.classList.remove('border-seyitler-primary');
                b.classList.add('border-gray-200');
            }
        });
    }

    // Thumbnail click
    thumbBtns.forEach((btn, idx) => {
        btn.addEventListener('click', () => {
            setActiveImage(idx);
        });
    });

    // Main Image Prev/Next arrows
    if (prevMainBtn) {
        prevMainBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            setActiveImage(currentIndex - 1);
        });
    }
    if (nextMainBtn) {
        nextMainBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            setActiveImage(currentIndex + 1);
        });
    }

    // Thumbnail Prev/Next buttons
    if (prevThumbBtn && thumbsList) {
        prevThumbBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            thumbsList.scrollBy({ left: -180, behavior: 'smooth' });
        });
    }
    if (nextThumbBtn && thumbsList) {
        nextThumbBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            thumbsList.scrollBy({ left: 180, behavior: 'smooth' });
        });
    }

    // Mouse Drag Scroll for thumbnails list
    if (thumbsList) {
        let isDown = false;
        let startX;
        let scrollLeft;

        thumbsList.addEventListener('mousedown', (e) => {
            isDown = true;
            thumbsList.classList.add('cursor-grabbing');
            thumbsList.classList.remove('cursor-grab');
            startX = e.pageX - thumbsList.offsetLeft;
            scrollLeft = thumbsList.scrollLeft;
        });

        thumbsList.addEventListener('mouseleave', () => {
            isDown = false;
            thumbsList.classList.remove('cursor-grabbing');
            thumbsList.classList.add('cursor-grab');
        });

        thumbsList.addEventListener('mouseup', () => {
            isDown = false;
            thumbsList.classList.remove('cursor-grabbing');
            thumbsList.classList.add('cursor-grab');
        });

        thumbsList.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - thumbsList.offsetLeft;
            const walk = (x - startX) * 1.5; // Scroll speed multiplier
            thumbsList.scrollLeft = scrollLeft - walk;
        });

        // Mouse Wheel Horizontal Scroll
        thumbsList.addEventListener('wheel', (e) => {
            if (e.deltaY !== 0) {
                e.preventDefault();
                thumbsList.scrollLeft += e.deltaY;
            }
        }, { passive: false });
    }
}

/**
 * 7. Sticky Header Shadow & Smooth State
 */
function initStickyHeader() {
    const header = document.querySelector('header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('shadow-md');
            header.classList.remove('shadow-sm');
        } else {
            header.classList.remove('shadow-md');
            header.classList.add('shadow-sm');
        }
    }, { passive: true });
}

/**
 * 8. Homepage Category Filter Tabs & Swiper Filter
 */
function initHomepageCategoryTabs() {
    const filterButtons = document.querySelectorAll('.cat-filter-btn');
    const productSwiperEl = document.querySelector('#home-products-swiper, .home-products-swiper');
    if (!filterButtons.length || !productSwiperEl) return;

    function filterSlides(catId) {
        const slides = productSwiperEl.querySelectorAll('.swiper-slide');
        slides.forEach(slide => {
            const itemCat = slide.getAttribute('data-category');
            if (!catId || catId === 'all' || itemCat === catId) {
                slide.style.display = '';
            } else {
                slide.style.display = 'none';
            }
        });

        if (productSwiperEl.swiper) {
            productSwiperEl.swiper.update();
            productSwiperEl.swiper.slideTo(0);
        }
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const catId = this.getAttribute('data-category');

            // Toggle active visual states
            filterButtons.forEach(b => {
                b.setAttribute('aria-pressed', 'false');
                b.className = 'cat-filter-btn px-5 py-3 text-sm font-semibold border transition-colors text-gray-700 border-gray-300 hover:border-seyitler-primary hover:text-seyitler-primary hover:bg-seyitler-primary/5 cursor-pointer';
            });
            this.setAttribute('aria-pressed', 'true');
            this.className = 'cat-filter-btn px-5 py-3 text-sm font-semibold border transition-colors bg-seyitler-primary text-white border-seyitler-primary cursor-pointer';

            filterSlides(catId);
        });
    });

    // Run initial filter on page load for the active button
    const activeBtn = document.querySelector('.cat-filter-btn[aria-pressed="true"]');
    if (activeBtn) {
        filterSlides(activeBtn.getAttribute('data-category'));
    }
}

/**
 * 9. Topbar Language Dropdown Toggle
 */
function initLanguageDropdown() {
    const btn = document.getElementById('lang-switch-btn');
    const menu = document.getElementById('lang-dropdown-menu');
    const chevron = document.getElementById('lang-chevron');
    if (!btn || !menu) return;

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            if (chevron) chevron.classList.add('rotate-180');
        } else {
            menu.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        }
    });

    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            menu.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        }
    });
}
