/**
 * Seyitler Kimya - Enterprise UI Dialog & Toast System
 * Replaces native browser alert/confirm popups with modern Tailwind modals and toasts.
 */

(function () {
    'use strict';

    const AdminDialog = {
        confirm: function (options) {
            return new Promise((resolve) => {
                const title = options.title || 'İşlem Onayı';
                const message = options.message || 'Bu işlemi gerçekleştirmek istediğinize emin misiniz?';
                const confirmText = options.confirmText || 'Evet, Sil';
                const cancelText = options.cancelText || 'Vazgeç';
                const type = options.type || 'danger'; // 'danger' | 'warning' | 'primary'

                // Remove existing dialog if any
                const existing = document.getElementById('admin-custom-dialog');
                if (existing) existing.remove();

                const isDanger = type === 'danger';
                const iconBg = isDanger ? 'bg-rose-50 text-rose-600 ring-8 ring-rose-50/50' : 'bg-amber-50 text-amber-600 ring-8 ring-amber-50/50';
                const confirmBtnBg = isDanger 
                    ? 'bg-rose-600 hover:bg-rose-700 text-white shadow-lg shadow-rose-600/30' 
                    : 'bg-[#0AA64D] hover:bg-emerald-700 text-white shadow-lg shadow-emerald-600/30';

                const iconSvg = isDanger
                    ? `<svg class="size-6 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>`
                    : `<svg class="size-6 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>`;

                const modalHtml = `
                <div id="admin-custom-dialog" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-6 bg-slate-950/70 backdrop-blur-md transition-opacity duration-200">
                    <div class="bg-white rounded-3xl shadow-2xl border border-slate-200/90 max-w-md w-full p-6 sm:p-7 text-center transform transition-all duration-200 scale-100">
                        <div class="size-14 rounded-2xl ${iconBg} flex items-center justify-center mx-auto mb-4">
                            ${iconSvg}
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 tracking-tight font-display">${title}</h3>
                        <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed font-sans">${message}</p>
                        <div class="mt-6 flex items-center justify-center gap-3">
                            <button type="button" id="admin-dialog-cancel" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors cursor-pointer">
                                ${cancelText}
                            </button>
                            <button type="button" id="admin-dialog-confirm" class="flex-1 px-4 py-2.5 ${confirmBtnBg} text-xs font-bold rounded-xl transition-all cursor-pointer">
                                ${confirmText}
                            </button>
                        </div>
                    </div>
                </div>
                `;

                document.body.insertAdjacentHTML('beforeend', modalHtml);

                const modalEl = document.getElementById('admin-custom-dialog');
                const confirmBtn = document.getElementById('admin-dialog-confirm');
                const cancelBtn = document.getElementById('admin-dialog-cancel');

                const cleanup = () => {
                    if (modalEl) modalEl.remove();
                };

                confirmBtn.addEventListener('click', () => {
                    cleanup();
                    resolve(true);
                });

                cancelBtn.addEventListener('click', () => {
                    cleanup();
                    resolve(false);
                });

                modalEl.addEventListener('click', (e) => {
                    if (e.target === modalEl) {
                        cleanup();
                        resolve(false);
                    }
                });
            });
        },

        toast: function (options) {
            const title = options.title || 'Bildirim';
            const message = options.message || '';
            const type = options.type || 'success';

            let toastContainer = document.getElementById('admin-toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'admin-toast-container';
                toastContainer.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-2.5 pointer-events-none';
                document.body.appendChild(toastContainer);
            }

            const isSuccess = type === 'success';
            const bg = isSuccess ? 'bg-[#0AA64D] text-white shadow-emerald-900/20' : 'bg-rose-600 text-white shadow-rose-900/20';
            const icon = isSuccess
                ? `<svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>`
                : `<svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>`;

            const toastItem = document.createElement('div');
            toastItem.className = `${bg} pointer-events-auto px-4 py-3 rounded-2xl shadow-xl flex items-center gap-3 text-xs font-semibold transform transition-all duration-300 translate-y-2 opacity-0`;
            toastItem.innerHTML = `
                ${icon}
                <div>
                    <div class="font-bold">${title}</div>
                    ${message ? `<div class="text-[11px] opacity-90 font-normal mt-0.5">${message}</div>` : ''}
                </div>
            `;

            toastContainer.appendChild(toastItem);

            requestAnimationFrame(() => {
                toastItem.classList.remove('translate-y-2', 'opacity-0');
            });

            setTimeout(() => {
                toastItem.classList.add('opacity-0', '-translate-y-2');
                setTimeout(() => toastItem.remove(), 300);
            }, 3500);
        }
    };

    // Replace native window.alert with AdminDialog.toast
    window.alert = function (msg) {
        AdminDialog.toast({
            title: 'Bilgi',
            message: msg,
            type: 'success'
        });
    };

    // Auto-bind to DOM forms on load
    function sanitizeNativeConfirmForms() {
        document.querySelectorAll('form').forEach(form => {
            const onsubmitAttr = form.getAttribute('onsubmit');
            if (onsubmitAttr && onsubmitAttr.includes('confirm')) {
                // Extract custom message if present
                const match = onsubmitAttr.match(/confirm\(['"]([^'"]+)['"]\)/);
                if (match && match[1]) {
                    form.dataset.confirmMessage = match[1];
                }
                form.removeAttribute('onsubmit');
            }
        });
    }

    // Global Interceptor: Bind to all delete forms and action buttons
    document.addEventListener('DOMContentLoaded', () => {
        sanitizeNativeConfirmForms();

        document.addEventListener('submit', async function (e) {
            const form = e.target;
            if (!form || form.tagName !== 'FORM') return;

            const action = form.getAttribute('action') || '';
            const hasDelete = action.includes('/delete') || action.includes('delete') || form.dataset.confirmMessage;

            if (hasDelete && !form.dataset.confirmed) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const customMsg = form.dataset.confirmMessage || 'Bu öğeyi kalıcı olarak silmek istediğinize emin misiniz? Bu işlem geri alınamaz.';
                const confirmed = await AdminDialog.confirm({
                    title: 'Kaydı Kalıcı Olarak Sil',
                    message: customMsg,
                    confirmText: 'Evet, Sil',
                    cancelText: 'Vazgeç',
                    type: 'danger'
                });

                if (confirmed) {
                    form.dataset.confirmed = 'true';
                    form.submit();
                }
            }
        }, true);
    });

    window.AdminDialog = AdminDialog;
})();
