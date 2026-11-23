const form = document.querySelector('.quote-form');

if (form) {
    const headings = [...form.querySelectorAll(':scope > .form-heading')];
    if (headings.length === 3) {
        const panels = headings.map((heading, index) => {
            const panel = document.createElement('section');
            panel.className = 'quote-panel';
            const title = heading.querySelector('h2');
            title.id = `quote-step-${index + 1}`;
            title.tabIndex = -1;
            panel.setAttribute('aria-labelledby', title.id);
            heading.before(panel);
            let node = heading;
            while (node && node !== headings[index + 1]) {
                const next = node.nextSibling;
                panel.append(node);
                node = next;
            }
            const intro = document.createElement('p');
            intro.className = 'step-intro';
            intro.textContent = [
                'Empecemos por el lugar donde necesitas la solución.',
                'Selecciona el área de trabajo y describe lo que quieres resolver.',
                'Revisa los datos de tu proyecto antes de registrarlo.',
            ][index];
            heading.after(intro);
            return panel;
        });

        const steps = document.createElement('nav');
        steps.className = 'quote-steps';
        steps.setAttribute('aria-label', 'Progreso de la solicitud');
        steps.innerHTML = '<div class="quote-steps-track" aria-hidden="true"><span></span></div><ol><li><button type="button" data-step-tab="0"><span>01</span> Organización</button></li><li><button type="button" data-step-tab="1"><span>02</span> Proyecto</button></li><li><button type="button" data-step-tab="2"><span>03</span> Contacto</button></li></ol>';
        panels[0].before(steps);
        const tabs = [...steps.querySelectorAll('[data-step-tab]')];
        const progress = steps.querySelector('.quote-steps-track span');

        const group = panels[1].querySelector('.category-field');
        const groupError = document.createElement('small');
        groupError.className = 'group-error';
        groupError.setAttribute('role', 'alert');
        groupError.textContent = 'Selecciona al menos una opción para continuar.';
        groupError.hidden = true;
        group.querySelector('.category-options').after(groupError);
        group.querySelectorAll('input[type="checkbox"]').forEach(input => input.addEventListener('change', () => {
            groupError.hidden = true;
            group.classList.remove('has-error');
        }));

        const privacyConsent = form.querySelector('[name="privacy_consent"]');
        const consentError = form.querySelector('.quote-consent-error');
        privacyConsent?.addEventListener('change', () => { if (privacyConsent.checked && consentError) consentError.hidden = true; });

        const review = document.createElement('div');
        review.className = 'quote-review';
        review.innerHTML = '<div class="quote-review-head"><span class="micro-label">RESUMEN DEL PROYECTO</span><button type="button" data-step-edit="1">Editar proyecto ↗</button></div><dl><div><dt>Organización</dt><dd data-review-company>—</dd></div><div><dt>Ubicación</dt><dd data-review-location>—</dd></div><div><dt>Áreas</dt><dd data-review-categories>—</dd></div><div><dt>Equipos</dt><dd data-review-interests>Sin selección específica</dd></div><div class="review-message"><dt>Necesidad</dt><dd data-review-message>—</dd></div></dl>';
        panels[2].querySelector('.form-submit').before(review);

        panels.forEach((panel, index) => {
            const actions = document.createElement('div');
            actions.className = 'step-actions';
            if (index === 0) actions.innerHTML = '<span>Paso 1 de 3</span><button class="button button-primary" type="button" data-step-next>Continuar <span aria-hidden="true">→</span></button>';
            else if (index === 1) actions.innerHTML = '<button class="step-back" type="button" data-step-back>← Atrás</button><button class="button button-primary" type="button" data-step-next>Continuar <span aria-hidden="true">→</span></button>';
            else {
                actions.classList.add('step-actions-last');
                actions.innerHTML = '<button class="step-back" type="button" data-step-back>← Atrás</button>';
            }
            panel.append(actions);
        });

        let currentStep = 0;
        const summaryText = (selector, text) => { review.querySelector(selector).textContent = text; };
        const selectedLabels = name => [...form.querySelectorAll(`input[name="${name}[]"]:checked`)]
            .map(input => input.closest('label').querySelector('span').textContent.trim()).join(', ');
        const updateReview = () => {
            summaryText('[data-review-company]', form.elements.empresa.value.trim() || '—');
            summaryText('[data-review-location]', form.elements.ubicacion.value.trim() || '—');
            summaryText('[data-review-categories]', selectedLabels('categorias') || '—');
            summaryText('[data-review-interests]', selectedLabels('intereses') || 'Sin selección específica');
            summaryText('[data-review-message]', form.elements.mensaje.value.trim() || '—');
        };
        const showStep = (index, focus = false) => {
            currentStep = index;
            panels.forEach((panel, panelIndex) => { panel.hidden = panelIndex !== index; });
            tabs.forEach((tab, tabIndex) => {
                tab.classList.toggle('is-current', tabIndex === index);
                tab.classList.toggle('is-complete', tabIndex < index);
                if (tabIndex === index) tab.setAttribute('aria-current', 'step');
                else tab.removeAttribute('aria-current');
            });
            progress.style.width = `${(index + 1) * 100 / 3}%`;
            if (index === 2) updateReview();
            if (focus) {
                const title = panels[index].querySelector('h2');
                title.focus({ preventScroll: true });
                panels[index].scrollIntoView({ behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth', block: 'start' });
            }
        };
        const validateStep = (index, report = true) => {
            if (index === 1 && !panels[1].querySelector('input[name="categorias[]"]:checked')) {
                if (report) {
                    groupError.hidden = false;
                    group.classList.add('has-error');
                    group.querySelector('input[type="checkbox"]').focus();
                }
                return false;
            }
            for (const input of panels[index].querySelectorAll('.field input, .field textarea')) {
                if (input.required && !input.value.trim()) input.setCustomValidity('Completa este campo para continuar.');
                else input.setCustomValidity('');
                if (!input.checkValidity()) {
                    if (report) input.reportValidity();
                    return false;
                }
            }
            if (index === 2 && privacyConsent && !privacyConsent.checked) {
                if (report) {
                    if (consentError) consentError.hidden = false;
                    privacyConsent.focus();
                }
                return false;
            }
            return true;
        };
        form.querySelectorAll('.field input, .field textarea').forEach(input => input.addEventListener('input', () => input.setCustomValidity('')));
        panels.forEach((panel, index) => {
            panel.querySelector('[data-step-next]')?.addEventListener('click', () => {
                if (validateStep(index)) showStep(index + 1, true);
            });
            panel.querySelector('[data-step-back]')?.addEventListener('click', () => showStep(index - 1, true));
        });
        tabs.forEach(tab => tab.addEventListener('click', () => {
            const target = Number(tab.dataset.stepTab);
            if (target > currentStep) {
                for (let index = currentStep; index < target; index++) {
                    if (!validateStep(index)) { showStep(index, true); return; }
                }
            }
            showStep(target, true);
        }));
        review.querySelector('[data-step-edit]').addEventListener('click', () => showStep(1, true));
        form.addEventListener('submit', event => {
            for (let index = 0; index < panels.length; index++) {
                if (!validateStep(index, false)) {
                    event.preventDefault();
                    showStep(index, true);
                    validateStep(index);
                    return;
                }
            }
        });

        const serverErrorStep = panels.findIndex(panel => panel.querySelector('[aria-invalid="true"]'));
        const categoryError = [...group.querySelectorAll('small:not(.group-error)')].length > 0;
        form.classList.add('is-guided');
        showStep(serverErrorStep >= 0 ? serverErrorStep : (categoryError ? 1 : 0));
    }
}
