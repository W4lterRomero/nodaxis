const form = document.querySelector('.quote-form');

if (form) {
    const categories = [...form.querySelectorAll('input[name="categorias[]"]')];
    const categoryError = form.querySelector('[data-category-error]');
    const categoryGroup = form.querySelector('.category-field');

    const selectedLabels = name => [...form.querySelectorAll(`input[name="${name}[]"]:checked`)]
        .map(input => input.closest('label').querySelector('span').textContent.trim());
    const fieldValue = name => String(form.elements.namedItem(name)?.value || '').trim();

    const messageForRequest = () => [
        'Hola, quiero solicitar una cotización de NODAXIS.',
        '',
        `Organización: ${fieldValue('empresa')}`,
        `Ubicación: ${fieldValue('ubicacion')}`,
        `Necesito: ${selectedLabels('categorias').join(', ')}`,
        `Equipos de interés: ${selectedLabels('intereses').join(', ') || 'Sin equipos específicos por ahora'}`,
        `Proyecto: ${fieldValue('mensaje')}`,
        `Contacto: ${fieldValue('nombre')}`,
        `Correo: ${fieldValue('email')}`,
        `Teléfono: ${fieldValue('telefono') || 'No indicado'}`,
    ].join('\n');

    categories.forEach(input => input.addEventListener('change', () => {
        if (categories.some(option => option.checked)) {
            categoryError.hidden = true;
            categoryGroup.classList.remove('has-error');
        }
    }));

    form.querySelectorAll('[data-quote-channel]').forEach(button => button.addEventListener('click', () => {
        if (!categories.some(option => option.checked)) {
            categoryError.hidden = false;
            categoryGroup.classList.add('has-error');
            categories[0]?.focus();
            return;
        }

        if (!form.reportValidity()) return;

        const message = messageForRequest();
        if (button.dataset.quoteChannel === 'whatsapp') {
            window.open(`https://wa.me/50372311719?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
        } else {
            const subject = encodeURIComponent('Solicitud de cotización NODAXIS');
            window.location.href = `mailto:ac23014@ues.edu.sv?subject=${subject}&body=${encodeURIComponent(message)}`;
        }
    }));
}
