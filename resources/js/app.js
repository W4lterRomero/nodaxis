import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');
if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', () => {
        const open = menuToggle.getAttribute('aria-expanded') !== 'true';
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        mainNav.classList.toggle('is-open', open);
    });
    mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Abrir menú');
        mainNav.classList.remove('is-open');
    }));
}

const showcase = document.querySelector('[data-showcase]');
if (showcase) {
    const modes = {
        redes: { title: 'Redes empresariales', copy: 'Conecta áreas, equipos y usuarios con una arquitectura pensada para crecer.', image: '/assets/illustrations/switch.svg', alt: 'Ilustración de un switch empresarial genérico', quote: '/cotizar?categoria=redes' },
        wifi: { title: 'Cobertura Wi-Fi', copy: 'Planifica la conectividad inalámbrica según espacios, usuarios y demanda.', image: '/assets/illustrations/wifi.svg', alt: 'Ilustración de un punto de acceso Wi-Fi genérico', quote: '/cotizar?categoria=wifi' },
        seguridad: { title: 'Seguridad perimetral', copy: 'Define el enrutamiento y los controles de acceso para tu operación.', image: '/assets/illustrations/firewall.svg', alt: 'Ilustración de router y firewall genéricos', quote: '/cotizar?categoria=seguridad' },
    };
    const buttons = [...showcase.querySelectorAll('.experience-tab')];
    const image = showcase.querySelector('[data-stage-image]');
    const title = showcase.querySelector('[data-stage-title]');
    const copy = showcase.querySelector('[data-stage-copy]');
    const quote = showcase.querySelector('[data-stage-link]');
    const panel = showcase.querySelector('[role="tabpanel"]');
    const progress = [...showcase.querySelectorAll('.experience-progress span')];
    const order = Object.keys(modes);
    let current = 'redes';
    let timer;
    let visible = true;
    let interacting = false;
    buttons.forEach(button => { button.tabIndex = button.dataset.mode === current ? 0 : -1; });
    const setMode = (mode, focus = false) => {
        if (!modes[mode] || mode === current) return;
        current = mode;
        const data = modes[mode];
        buttons.forEach((button, index) => {
            const active = button.dataset.mode === mode;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-selected', String(active));
            button.tabIndex = active ? 0 : -1;
            progress[index].classList.toggle('is-active', active);
            if (active && focus) button.focus();
        });
        panel.setAttribute('aria-labelledby', `tab-${mode}`);
        const swap = () => {
            image.src = data.image;
            image.alt = data.alt;
            title.textContent = data.title;
            copy.textContent = data.copy;
            quote.href = data.quote;
            quote.setAttribute('aria-label', `Cotizar ${data.title.toLowerCase()}`);
            if (!reduceMotion.matches) gsap.fromTo(image, { opacity: 0, y: 20, scale: .96 }, { opacity: 1, y: 0, scale: 1, duration: .55, ease: 'power2.out' });
        };
        if (reduceMotion.matches) swap();
        else gsap.to(image, { opacity: 0, y: -12, duration: .18, onComplete: swap });
    };
    const stopAuto = () => { clearInterval(timer); timer = undefined; };
    const startAuto = () => {
        stopAuto();
        if (reduceMotion.matches || !visible || interacting) return;
        timer = setInterval(() => setMode(order[(order.indexOf(current) + 1) % order.length]), 6000);
    };
    buttons.forEach(button => {
        button.addEventListener('click', () => { setMode(button.dataset.mode); interacting = true; stopAuto(); });
        button.addEventListener('keydown', event => {
            if (!['ArrowRight', 'ArrowLeft', 'Home', 'End'].includes(event.key)) return;
            event.preventDefault();
            const index = order.indexOf(current);
            const next = event.key === 'Home' ? 0 : event.key === 'End' ? order.length - 1 : (index + (event.key === 'ArrowRight' ? 1 : -1) + order.length) % order.length;
            setMode(order[next], true);
            interacting = true;
            stopAuto();
        });
    });
    let touchStartX = null;
    panel.addEventListener('touchstart', event => { touchStartX = event.changedTouches[0]?.clientX ?? null; }, { passive: true });
    panel.addEventListener('touchend', event => {
        if (touchStartX === null) return;
        const distance = (event.changedTouches[0]?.clientX ?? touchStartX) - touchStartX;
        touchStartX = null;
        if (Math.abs(distance) < 45) return;
        setMode(order[(order.indexOf(current) + (distance < 0 ? 1 : -1) + order.length) % order.length]);
        interacting = true;
        stopAuto();
    }, { passive: true });
    showcase.addEventListener('mouseenter', stopAuto);
    showcase.addEventListener('mouseleave', startAuto);
    showcase.addEventListener('focusin', stopAuto);
    showcase.addEventListener('focusout', event => { if (!showcase.contains(event.relatedTarget)) startAuto(); });
    new IntersectionObserver(([entry]) => { visible = entry.isIntersecting; if (visible) startAuto(); else stopAuto(); }, { threshold: .25 }).observe(showcase);
    reduceMotion.addEventListener('change', startAuto);
    startAuto();
}

const catalog = document.querySelector('[data-catalog-grid]');
if (catalog) {
    const filters = [...document.querySelectorAll('[data-filter]')];
    const search = document.querySelector('[data-catalog-search]');
    const cards = [...catalog.querySelectorAll('.catalog-card')];
    const empty = document.querySelector('[data-catalog-empty]');
    let category = 'todos';
    const normalize = value => value.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
    const apply = () => {
        const term = normalize(search.value);
        let shown = 0;
        cards.forEach(card => {
            const match = (category === 'todos' || card.dataset.category === category) && normalize(card.dataset.name).includes(term);
            card.hidden = !match;
            if (match) shown++;
        });
        empty.hidden = shown > 0;
    };
    filters.forEach(button => button.addEventListener('click', () => {
        category = button.dataset.filter;
        filters.forEach(item => {
            const active = item === button;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-pressed', String(active));
        });
        apply();
    }));
    search.addEventListener('input', apply);

    const itemButtons = [...catalog.querySelectorAll('[data-quote-item]')];
    const allowed = itemButtons.map(button => button.dataset.quoteItem);
    const dock = document.querySelector('[data-quote-dock]');
    const dockCount = dock.querySelector('[data-quote-count]');
    const dockLink = dock.querySelector('[data-quote-go]');
    let selected = [];
    try { selected = JSON.parse(localStorage.getItem('nodaxis-quote-items') || '[]').filter(item => allowed.includes(item)); } catch { selected = []; }
    const renderSelection = () => {
        itemButtons.forEach(button => {
            const active = selected.includes(button.dataset.quoteItem);
            button.setAttribute('aria-pressed', String(active));
            button.textContent = active ? 'Quitar de solicitud −' : 'Añadir a solicitud +';
        });
        dock.hidden = selected.length === 0;
        dockCount.textContent = String(selected.length);
        const url = new URL('/cotizar', location.origin);
        selected.forEach(item => url.searchParams.append('intereses[]', item));
        dockLink.href = url.pathname + url.search;
        try { localStorage.setItem('nodaxis-quote-items', JSON.stringify(selected)); } catch { /* El sitio sigue funcionando sin almacenamiento local. */ }
    };
    itemButtons.forEach(button => button.addEventListener('click', () => {
        const item = button.dataset.quoteItem;
        selected = selected.includes(item) ? selected.filter(value => value !== item) : [...selected, item];
        renderSelection();
    }));
    dock.querySelector('[data-quote-clear]').addEventListener('click', () => { selected = []; renderSelection(); });
    renderSelection();
}

if (!reduceMotion.matches) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from('.hero-copy > *', { opacity: 0, y: 22, duration: .65, stagger: .11, ease: 'power2.out' });
    gsap.from('.hero-experience', { opacity: 0, y: 30, duration: .9, delay: .13, ease: 'power2.out' });
    document.querySelectorAll('[data-reveal]:not(.hero-copy):not(.hero-experience)').forEach(element => {
        gsap.from(element, { opacity: 0, y: 28, duration: .7, ease: 'power2.out', scrollTrigger: { trigger: element, start: 'top 88%', once: true } });
    });
}
