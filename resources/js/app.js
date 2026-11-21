import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import './quote-flow.js';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');
const header = document.querySelector('.site-header');
if (menuToggle && mainNav) {
    const setMenu = open => {
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        mainNav.classList.toggle('is-open', open);
    };
    menuToggle.addEventListener('click', () => setMenu(menuToggle.getAttribute('aria-expanded') !== 'true'));
    mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', event => { if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') { setMenu(false); menuToggle.focus(); } });
    document.addEventListener('click', event => { if (menuToggle.getAttribute('aria-expanded') === 'true' && !header.contains(event.target)) setMenu(false); });
    window.matchMedia('(min-width: 901px)').addEventListener('change', event => { if (event.matches) setMenu(false); });
}

if (header) {
    const progress = header.querySelector('[data-scroll-progress]');
    let ticking = false;
    const updateScroll = () => {
        const max = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
        progress.style.transform = `scaleX(${Math.min(1, window.scrollY / max)})`;
        header.classList.toggle('is-scrolled', window.scrollY > 15);
        ticking = false;
    };
    window.addEventListener('scroll', () => { if (!ticking) { ticking = true; requestAnimationFrame(updateScroll); } }, { passive: true });
    updateScroll();
    const links = [...header.querySelectorAll('[data-nav-link]')];
    const sections = links.map(link => document.getElementById(link.hash.slice(1))).filter(Boolean);
    if (sections.length) {
        const sectionObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                links.forEach(link => link.classList.toggle('is-current', link.hash === `#${entry.target.id}`));
            });
        }, { rootMargin: '-25% 0px -65% 0px' });
        sections.forEach(section => sectionObserver.observe(section));
    }
}

const heroVideo = document.querySelector('[data-hero-video]');
if (heroVideo) {
    let visible = true;
    const syncVideo = () => {
        if (reduceMotion.matches || !visible || document.hidden) heroVideo.pause();
        else heroVideo.play().catch(() => { /* La imagen de portada sigue visible si el navegador bloquea la reproducción. */ });
    };
    new IntersectionObserver(([entry]) => { visible = entry.isIntersecting; syncVideo(); }, { threshold: .08 }).observe(heroVideo);
    document.addEventListener('visibilitychange', syncVideo);
    reduceMotion.addEventListener('change', syncVideo);
    syncVideo();
}

const hologram = document.querySelector('[data-hologram]');
if (hologram) {
    if (!reduceMotion.matches) {
        hologram.classList.add('is-prepared');
        new IntersectionObserver(([entry], observer) => {
            if (!entry.isIntersecting) return;
            hologram.classList.add('is-visible');
            observer.disconnect();
        }, { threshold: .3 }).observe(hologram);
        const visual = hologram.querySelector('.hologram-visual');
        visual.addEventListener('pointermove', event => {
            if (event.pointerType === 'touch') return;
            const rect = visual.getBoundingClientRect();
            visual.style.setProperty('--holo-x', `${((event.clientX - rect.left) / rect.width - .5) * 12}px`);
            visual.style.setProperty('--holo-y', `${((event.clientY - rect.top) / rect.height - .5) * 8}px`);
        });
        visual.addEventListener('pointerleave', () => {
            visual.style.setProperty('--holo-x', '0px');
            visual.style.setProperty('--holo-y', '0px');
        });
    }
    const nodes = [...hologram.querySelectorAll('[data-holo-node]')];
    const detail = {
        sede: { index: '01 / SEDE', title: 'Una base para conectar.', copy: 'La ubicación y la cantidad de usuarios orientan la distribución de la red.', quote: '/cotizar?categoria=redes' },
        wifi: { index: '02 / WI-FI', title: 'Cobertura donde se necesita.', copy: 'Los espacios y la demanda de conexión definen los puntos de acceso.', quote: '/cotizar?categoria=wifi' },
        equipos: { index: '03 / EQUIPOS', title: 'Componentes con propósito.', copy: 'Switches, enlaces y cableado se seleccionan según el alcance del proyecto.', quote: '/cotizar?categoria=equipos' },
        control: { index: '04 / CONTROL', title: 'Acceso según tu operación.', copy: 'El enrutamiento y los controles perimetrales se plantean para el entorno real.', quote: '/cotizar?categoria=seguridad' },
    };
    const select = (node, focus = false) => {
        const key = node.dataset.holoNode;
        const data = detail[key];
        if (!data) return;
        hologram.dataset.active = key;
        nodes.forEach(button => {
            const active = button === node;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-pressed', String(active));
        });
        hologram.querySelector('[data-holo-index]').textContent = data.index;
        hologram.querySelector('[data-holo-title]').textContent = data.title;
        hologram.querySelector('[data-holo-copy]').textContent = data.copy;
        hologram.querySelector('[data-holo-link]').href = data.quote;
        if (focus) node.focus();
    };
    nodes.forEach((node, index) => {
        node.addEventListener('click', () => select(node));
        node.addEventListener('keydown', event => {
            if (!['ArrowRight', 'ArrowLeft', 'ArrowDown', 'ArrowUp'].includes(event.key)) return;
            event.preventDefault();
            const next = (index + (['ArrowRight', 'ArrowDown'].includes(event.key) ? 1 : -1) + nodes.length) % nodes.length;
            select(nodes[next], true);
        });
    });
}

const showcase = document.querySelector('[data-showcase]');
if (showcase) {
    const modes = {
        redes: { title: 'Redes empresariales', copy: 'Conecta áreas, equipos y usuarios con una arquitectura pensada para crecer.', image: '/assets/catalog/switch.webp', alt: 'Representación conceptual de un switch empresarial genérico', quote: '/cotizar?categoria=redes' },
        wifi: { title: 'Cobertura Wi-Fi', copy: 'Planifica la conectividad inalámbrica según espacios, usuarios y demanda.', image: '/assets/catalog/wifi.webp', alt: 'Representación conceptual de un punto de acceso Wi-Fi genérico', quote: '/cotizar?categoria=wifi' },
        seguridad: { title: 'Seguridad perimetral', copy: 'Define el enrutamiento y los controles de acceso para tu operación.', image: '/assets/catalog/firewall.webp', alt: 'Representación conceptual de un firewall genérico', quote: '/cotizar?categoria=seguridad' },
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
            if (!reduceMotion.matches) gsap.fromTo(image, { opacity: 0 }, { opacity: 1, duration: .55, ease: 'power2.out' });
        };
        if (reduceMotion.matches) swap();
        else gsap.to(image, { opacity: 0, duration: .18, onComplete: swap });
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
    const feature = document.querySelector('[data-catalog-feature]');
    const tabs = [...feature.querySelectorAll('[data-feature-tab]')];
    const featureImage = feature.querySelector('[data-feature-image]');
    const featureTitle = feature.querySelector('[data-feature-title]');
    const featureCopy = feature.querySelector('[data-feature-copy]');
    const featureGroup = feature.querySelector('[data-feature-group]');
    const featureIndex = feature.querySelector('[data-feature-index]');
    const featurePanel = feature.querySelector('[role="tabpanel"]');
    const featureVisual = feature.querySelector('[data-feature-visual]');
    const featureAdd = feature.querySelector('[data-quote-item]');
    let activeFeature = 0;
    let featureTimer;
    let featureVisible = false;
    let featureInteracted = false;
    const stopFeature = () => { clearInterval(featureTimer); featureTimer = undefined; };
    const showFeature = (index, focus = false) => {
        const next = (index + tabs.length) % tabs.length;
        if (next === activeFeature && !focus) return;
        activeFeature = next;
        const tab = tabs[next];
        feature.dataset.active = tab.dataset.featureTab;
        tabs.forEach((item, i) => {
            const active = i === next;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-selected', String(active));
            item.tabIndex = active ? 0 : -1;
        });
        featurePanel.setAttribute('aria-labelledby', tab.id);
        featureIndex.textContent = String(next + 1).padStart(2, '0');
        const update = () => {
            featureImage.src = tab.dataset.featureImageSrc;
            featureImage.alt = `Representación conceptual de ${tab.dataset.featureName.toLowerCase()}`;
            featureTitle.textContent = tab.dataset.featureName;
            featureCopy.textContent = tab.dataset.featureSummary;
            featureGroup.textContent = `${tab.dataset.featureGroupName} / ${String(next + 1).padStart(2, '0')}`;
            featureAdd.dataset.quoteItem = tab.dataset.featureTab;
            featureAdd.dispatchEvent(new Event('catalog:selection-sync'));
            if (!reduceMotion.matches) gsap.fromTo(featureImage, { opacity: 0 }, { opacity: 1, duration: .65, ease: 'power3.out', overwrite: true });
        };
        gsap.killTweensOf(featureImage);
        if (reduceMotion.matches) update();
        else gsap.to(featureImage, { opacity: 0, duration: .2, ease: 'power2.in', onComplete: update });
        if (focus) tab.focus();
        if (featureInteracted || focus) tab.scrollIntoView({ behavior: reduceMotion.matches ? 'instant' : 'smooth', block: 'nearest', inline: 'center' });
    };
    const startFeature = () => {
        stopFeature();
        if (featureInteracted || !featureVisible || reduceMotion.matches || document.hidden) return;
        featureTimer = setInterval(() => showFeature(activeFeature + 1), 6500);
    };
    const chooseFeature = (index, focus = false) => { featureInteracted = true; stopFeature(); showFeature(index, focus); };
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => chooseFeature(index));
        tab.addEventListener('keydown', event => {
            if (!['ArrowRight', 'ArrowLeft', 'Home', 'End'].includes(event.key)) return;
            event.preventDefault();
            const next = event.key === 'Home' ? 0 : event.key === 'End' ? tabs.length - 1 : activeFeature + (event.key === 'ArrowRight' ? 1 : -1);
            chooseFeature(next, true);
        });
    });
    feature.querySelector('[data-feature-prev]').addEventListener('click', () => chooseFeature(activeFeature - 1));
    feature.querySelector('[data-feature-next]').addEventListener('click', () => chooseFeature(activeFeature + 1));
    let touchX;
    featurePanel.addEventListener('touchstart', event => { touchX = event.changedTouches[0]?.clientX; }, { passive: true });
    featurePanel.addEventListener('touchend', event => {
        if (touchX === undefined) return;
        const distance = event.changedTouches[0].clientX - touchX;
        touchX = undefined;
        if (Math.abs(distance) > 45) chooseFeature(activeFeature + (distance < 0 ? 1 : -1));
    }, { passive: true });
    featureVisual.addEventListener('pointermove', event => {
        if (reduceMotion.matches || event.pointerType === 'touch') return;
        const rect = featureVisual.getBoundingClientRect();
        featureVisual.style.setProperty('--move-x', `${((event.clientX - rect.left) / rect.width - .5) * 22}px`);
        featureVisual.style.setProperty('--move-y', `${((event.clientY - rect.top) / rect.height - .5) * 16}px`);
    });
    featureVisual.addEventListener('pointerleave', () => { featureVisual.style.setProperty('--move-x', '0px'); featureVisual.style.setProperty('--move-y', '0px'); });
    feature.addEventListener('mouseenter', stopFeature);
    feature.addEventListener('mouseleave', startFeature);
    feature.addEventListener('focusin', stopFeature);
    feature.addEventListener('focusout', event => { if (!feature.contains(event.relatedTarget)) startFeature(); });
    document.addEventListener('visibilitychange', startFeature);
    reduceMotion.addEventListener('change', startFeature);
    new IntersectionObserver(([entry]) => { featureVisible = entry.isIntersecting; if (featureVisible) startFeature(); else stopFeature(); }, { threshold: .3 }).observe(feature);

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

    catalog.querySelectorAll('[data-feature-open]').forEach(button => button.addEventListener('click', () => {
        const index = tabs.findIndex(tab => tab.dataset.featureTab === button.dataset.featureOpen);
        if (index < 0) return;
        chooseFeature(index);
        feature.scrollIntoView({ behavior: reduceMotion.matches ? 'instant' : 'smooth', block: 'center' });
    }));

    const itemButtons = [...catalog.querySelectorAll('[data-quote-item]'), featureAdd];
    const allowed = [...new Set(itemButtons.map(button => button.dataset.quoteItem))];
    const dock = document.querySelector('[data-quote-dock]');
    const dockCount = dock.querySelector('[data-quote-count]');
    const dockLink = dock.querySelector('[data-quote-go]');
    let selected = [];
    try { selected = JSON.parse(localStorage.getItem('nodaxis-quote-items') || '[]').filter(item => allowed.includes(item)); } catch { selected = []; }
    const renderSelection = () => {
        itemButtons.forEach(button => {
            const active = selected.includes(button.dataset.quoteItem);
            button.setAttribute('aria-pressed', String(active));
            if (button === featureAdd) button.innerHTML = active ? 'Quitar de solicitud <span aria-hidden="true">−</span>' : 'Añadir a solicitud <span aria-hidden="true">↗</span>';
            else button.innerHTML = active ? 'Quitar <span aria-hidden="true">−</span>' : 'Añadir <span aria-hidden="true">+</span>';
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
    featureAdd.addEventListener('catalog:selection-sync', renderSelection);
    dock.querySelector('[data-quote-clear]').addEventListener('click', () => { selected = []; renderSelection(); });
    renderSelection();
}

if (!reduceMotion.matches) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from('.hero-copy > *', { opacity: 0, y: 22, duration: .65, stagger: .11, ease: 'power2.out' });
    gsap.from('.hero-experience', { opacity: 0, y: 30, duration: .9, ease: 'power2.out', scrollTrigger: { trigger: '.hero-experience', start: 'top 88%', once: true } });
    document.querySelectorAll('[data-reveal]:not(.hero-copy):not(.hero-experience)').forEach(element => {
        gsap.from(element, { opacity: 0, y: 28, duration: .7, ease: 'power2.out', scrollTrigger: { trigger: element, start: 'top 88%', once: true } });
    });
}
