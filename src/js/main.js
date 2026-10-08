/**
 * Agency Theme - Main Vanilla JavaScript
 * Zero jQuery dependency. Strict ES6+.
 */
document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initAjaxFilter();
});

function initNavigation() {
    const toggle = document.querySelector('.c-header__toggle');
    const nav = document.querySelector('.c-nav');

    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('c-nav--open');
        toggle.setAttribute('aria-expanded', String(isOpen));
    });
}

function initAjaxFilter() {
    const filterButtons = document.querySelectorAll('.c-filter-nav__item');
    const resultsContainer = document.getElementById('project-results');

    if (!filterButtons.length || !resultsContainer || typeof AgencyConfig === 'undefined') {
        return;
    }

    let controller = null;

    filterButtons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const category = btn.dataset.filter;

            filterButtons.forEach(b => {
                b.classList.remove('c-filter-nav__item--active');
                b.setAttribute('aria-pressed', 'false');
            });
            btn.classList.add('c-filter-nav__item--active');
            btn.setAttribute('aria-pressed', 'true');

            if (controller) controller.abort();
            controller = new AbortController();

            resultsContainer.setAttribute('aria-busy', 'true');
            resultsContainer.classList.add('c-portfolio__grid--loading');

            try {
                const formData = new FormData();
                formData.append('action', 'agency_filter_projects');
                formData.append('nonce', AgencyConfig.nonce);
                formData.append('category', category);

                const res = await fetch(AgencyConfig.ajaxUrl, {
                    method: 'POST',
                    body: formData,
                    signal: controller.signal
                });

                if (!res.ok) throw new Error(`HTTP ${res.status}`);

                const data = await res.json();
                if (data.success && typeof data.data.html === 'string') {
                    resultsContainer.innerHTML = data.data.html;
                }
            } catch (err) {
                if (err.name !== 'AbortError') {
                    console.error('AJAX Filter Error:', err);
                }
            } finally {
                resultsContainer.removeAttribute('aria-busy');
                resultsContainer.classList.remove('c-portfolio__grid--loading');
            }
        });
    });
}
