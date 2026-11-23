@extends('layouts.site')

@section('title', 'Términos y privacidad | NODAXIS')

@section('content')
<section class="legal-page section-space" aria-labelledby="legal-title">
    <div class="shell legal-shell">
        <p class="eyebrow">NODAXIS · El Salvador</p>
        <h1 id="legal-title">Términos y aviso de privacidad</h1>
        <p class="legal-updated">Información para usar este sitio, solicitar una cotización o suscribirte al Pulso de red.</p>

        <article class="legal-section"><h2>Información del sitio</h2><p>Este sitio presenta a NODAXIS y sus servicios de redes empresariales en El Salvador. Para consultas puedes escribir a <a href="mailto:ac23014@ues.edu.sv">ac23014@ues.edu.sv</a>, <a href="mailto:rh23015@ues.edu.sv">rh23015@ues.edu.sv</a> o <a href="mailto:rg22023@ues.edu.sv">rg22023@ues.edu.sv</a>, o al WhatsApp <a href="https://wa.me/50372311719">+503 7231 1719</a>.</p></article>

        <article class="legal-section"><h2>Equipos, servicios y cotizaciones</h2><p>Las descripciones e imágenes del catálogo ayudan a identificar familias de equipos. No confirman marca, modelo, existencia, precio, garantía ni fecha de entrega. Estos datos y el alcance del servicio se confirman en una cotización específica. Una solicitud enviada desde el sitio es una consulta; la compra se acuerda por separado.</p></article>

        <article class="legal-section"><h2>Programa de afiliados</h2><p>NODAXIS anuncia una comisión del 10% por referencias elegibles. Antes de registrar o compartir una referencia, la persona interesada debe comunicarse con NODAXIS para dejar acordados por escrito el monto sobre el que se calcula la comisión, los requisitos de elegibilidad, las exclusiones y la fecha y forma de pago. El porcentaje por sí solo no registra una referencia ni define esos detalles.</p></article>

        <article class="legal-section"><h2>Datos de cotización y contacto</h2><p>Usamos los datos que compartes en el formulario de cotización para comprender el proyecto, responderte y dar seguimiento a esa solicitud. Incluye únicamente información necesaria para atender la consulta. Para pedir acceso, corrección o eliminación de tus datos, escribe a cualquiera de los correos de contacto que aparecen arriba.</p></article>

        <article class="legal-section"><h2>Boletín Pulso de red</h2><p>La suscripción es voluntaria y separada de una cotización. Guardamos el correo que proporcionas para administrar la lista y preparar envíos sobre Wi-Fi, seguridad, cableado y equipos. Puedes solicitar la baja desde el formulario al final de esta página. No publicamos tu correo ni lo usamos para fines ajenos a la suscripción y la atención de tu solicitud.</p></article>

        <article class="legal-section"><h2>Uso del sitio</h2><p>Al utilizar este sitio aceptas no interferir con su funcionamiento ni enviar información falsa o contenido que infrinja derechos de otras personas. Los contenidos pueden actualizarse para reflejar cambios en los servicios, el catálogo o estas condiciones.</p></article>

        <form class="unsubscribe-form" id="newsletter-unsubscribe" action="{{ route('newsletter.unsubscribe') }}" method="post">
            @csrf
            <h2>Cancelar suscripción</h2>
            <p>Escribe el correo que registraste en Pulso de red y lo retiraremos de la lista.</p>
            <div class="newsletter-entry"><label class="sr-only" for="unsubscribe-email">Correo electrónico</label><input id="unsubscribe-email" type="email" name="email" autocomplete="email" placeholder="nombre@empresa.com" required><button class="button button-outline" type="submit">Dar de baja</button></div>
            <input class="newsletter-trap" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
            @if(session('unsubscribe_success'))<p class="form-status" role="status">Solicitud procesada. Si ese correo estaba suscrito, quedó dado de baja.</p>@endif
            @error('email')<p class="form-error" role="alert">Revisa el correo ingresado.</p>@enderror
        </form>
        <p class="legal-source">La información sobre datos personales debe revisarse periódicamente conforme a la normativa aplicable en El Salvador. <a href="https://www.asamblea.gob.sv/leyes-y-decretos/view/6054" target="_blank" rel="noopener">Ley para la Protección de Datos Personales</a> · <a href="https://www.asamblea.gob.sv/leyes-y-decretos/view/7022" target="_blank" rel="noopener">Reformas de 2026</a>.</p>
    </div>
</section>
@endsection
