import './quote-flow.js';

const siteBase = (document.querySelector('meta[name="nodaxis-base"]')?.content || '/').replace(/\/?$/, '/');
const siteHref = path => new URL(`${siteBase}${path.replace(/^\/+/, '')}`, location.origin).href;

const staticQuote = document.querySelector('[data-static-quote]');
if (staticQuote) {
    const categories = { redes: 'Redes empresariales', wifi: 'Wi-Fi', seguridad: 'Seguridad perimetral', cableado: 'Cableado e infraestructura', soporte: 'Soporte y mantenimiento', equipos: 'Equipos de red' };
    const products = { switches: 'Switches', 'access-points': 'Puntos de acceso Wi-Fi', 'routers-firewalls': 'Routers y firewalls', 'enlaces-inalambricos': 'Enlaces inalámbricos', 'racks-gabinetes': 'Racks y gabinetes', cableado: 'Cableado y paneles', 'energia-ups': 'Respaldo de energía', 'fibra-optica': 'Fibra óptica y módulos', 'telefonia-ip': 'Telefonía IP', 'inyectores-poe': 'Inyectores PoE', 'conversores-fibra': 'Convertidores de medios' };
    const params = new URL(location.href).searchParams;
    const selectedCategories = [...params.getAll('categoria'), ...params.getAll('categorias[]')].map(value => categories[value]).filter(Boolean);
    const selectedProducts = [...params.getAll('intereses'), ...params.getAll('intereses[]')].map(value => products[value]).filter(Boolean);
    const details = [selectedCategories.length ? `Servicio: ${[...new Set(selectedCategories)].join(', ')}.` : '', selectedProducts.length ? `Equipos: ${[...new Set(selectedProducts)].join(', ')}.` : ''].filter(Boolean).join('\n');
    const message = `Hola, quiero solicitar una cotización a NODAXIS.${details ? `\n${details}` : ''}\n\nEmpresa: \nUbicación: \nNecesidad: `;
    const summary = staticQuote.querySelector('[data-static-quote-summary]');
    if (details && summary) summary.textContent = `Tu solicitud incluye ${[...new Set([...selectedCategories, ...selectedProducts])].join(' y ')}. Continúa por WhatsApp o correo y agrega tu empresa, ubicación y descripción del proyecto.`;
    const whatsapp = staticQuote.querySelector('[data-static-whatsapp]');
    if (whatsapp) whatsapp.href = `https://wa.me/50372311719?text=${encodeURIComponent(message)}`;
    const email = staticQuote.querySelector('[data-static-email]');
    if (email) email.href = `mailto:ac23014@ues.edu.sv?subject=${encodeURIComponent('Solicitud de cotización NODAXIS')}&body=${encodeURIComponent(message)}`;
}

const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');
if (menuToggle && mainNav) {
    const setMenu = open => {
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        mainNav.classList.toggle('is-open', open);
    };
    menuToggle.addEventListener('click', () => setMenu(menuToggle.getAttribute('aria-expanded') !== 'true'));
    mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
            setMenu(false);
            menuToggle.focus();
        }
    });
    document.addEventListener('click', event => {
        if (menuToggle.getAttribute('aria-expanded') === 'true' && !mainNav.contains(event.target) && !menuToggle.contains(event.target)) setMenu(false);
    });
    window.matchMedia('(min-width: 701px)').addEventListener('change', event => { if (event.matches) setMenu(false); });
}

const catalog = document.querySelector('[data-catalog-grid]');
if (catalog) {
    const cards = [...catalog.querySelectorAll('.catalog-card')];
    const filters = [...document.querySelectorAll('[data-filter]')];
    const search = document.querySelector('[data-catalog-search]');
    const empty = document.querySelector('[data-catalog-empty]');
    const normalize = value => value.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
    let category = 'todos';

    const applyFilters = () => {
        const term = normalize(search?.value || '');
        let visible = 0;
        cards.forEach(card => {
            const matches = (category === 'todos' || card.dataset.category === category) && normalize(`${card.dataset.name} ${card.textContent}`).includes(term);
            card.hidden = !matches;
            if (matches) visible++;
        });
        if (empty) empty.hidden = visible > 0;
    };

    filters.forEach(button => button.addEventListener('click', () => {
        category = button.dataset.filter;
        filters.forEach(item => {
            const active = item === button;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-pressed', String(active));
        });
        applyFilters();
    }));
    search?.addEventListener('input', applyFilters);

    const detailDialog = document.querySelector('[data-catalog-dialog]');
    let detailOpener = null;
    catalog.querySelectorAll('[data-feature-open]').forEach(button => button.addEventListener('click', () => {
        const card = button.closest('.catalog-card');
        if (!card || !detailDialog) return;
        detailOpener = button;
        const slug = card.dataset.slug;
        detailDialog.querySelector('[data-detail-title]').textContent = card.querySelector('h3').textContent;
        detailDialog.querySelector('[data-detail-summary]').textContent = card.querySelector('.catalog-card > p').textContent;
        detailDialog.querySelector('[data-detail-group]').textContent = card.querySelector('.catalog-tag').textContent;
        const guide = document.querySelector(`template[data-detail-guide="${slug}"]`);
        detailDialog.querySelector('[data-detail-questions]').replaceChildren(guide.content.cloneNode(true));
        const quoteUrl = new URL(siteHref('/cotizar'));
        quoteUrl.searchParams.set('intereses', slug);
        detailDialog.querySelector('[data-detail-quote]').href = quoteUrl.pathname + quoteUrl.search;
        detailDialog.showModal();
    }));

    detailDialog?.querySelector('[data-detail-close]')?.addEventListener('click', () => detailDialog.close());
    detailDialog?.addEventListener('click', event => { if (event.target === detailDialog) detailDialog.close(); });
    detailDialog?.addEventListener('close', () => detailOpener?.focus());

    const itemButtons = [...catalog.querySelectorAll('[data-quote-item]')];
    const allowed = [...new Set(itemButtons.map(button => button.dataset.quoteItem))];
    const dock = document.querySelector('[data-quote-dock]');
    if (dock) {
        const count = dock.querySelector('[data-quote-count]');
        const label = dock.querySelector('[data-quote-label]');
        const link = dock.querySelector('[data-quote-go]');
        let selected = [];
        try { selected = JSON.parse(localStorage.getItem('nodaxis-quote-items') || '[]').filter(item => allowed.includes(item)); } catch { selected = []; }

        const renderSelection = () => {
            itemButtons.forEach(button => {
                const active = selected.includes(button.dataset.quoteItem);
                button.setAttribute('aria-pressed', String(active));
                button.innerHTML = active ? 'Quitar <span aria-hidden="true">−</span>' : 'Añadir <span aria-hidden="true">+</span>';
            });
            dock.hidden = selected.length === 0;
            count.textContent = String(selected.length);
            label.textContent = selected.length === 1 ? 'tipo de equipo' : 'tipos de equipo';
            const url = new URL(siteHref('/cotizar'));
            selected.forEach(item => url.searchParams.append('intereses[]', item));
            link.href = url.pathname + url.search;
            try { localStorage.setItem('nodaxis-quote-items', JSON.stringify(selected)); } catch { /* La selección vive durante esta visita. */ }
        };

        itemButtons.forEach(button => button.addEventListener('click', () => {
            const item = button.dataset.quoteItem;
            selected = selected.includes(item) ? selected.filter(value => value !== item) : [...selected, item];
            renderSelection();
        }));
        dock.querySelector('[data-quote-clear]')?.addEventListener('click', () => { selected = []; renderSelection(); });
        renderSelection();
    }
}
