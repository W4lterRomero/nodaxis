@extends('layouts.site')

@section('content')
<section class="hero" aria-labelledby="hero-title">
    <div class="shell hero-layout">
        <div class="hero-copy">
            <p class="eyebrow">Redes empresariales · El Salvador</p>
            <h1 id="hero-title">¿Qué necesitas conectar en tu empresa?</h1>
            <p class="hero-intro">Cotizamos redes cableadas, Wi‑Fi y equipos para empresas e instituciones en El Salvador. Cuéntanos cuántas áreas y equipos necesitas conectar.</p>
            <div class="hero-actions"><a class="button button-primary" href="{{ url('/cotizar') }}">Solicitar cotización</a><a class="text-link" href="#soluciones">Ver soluciones <span aria-hidden="true">↓</span></a></div>
        </div>
        <aside class="hero-aside" aria-label="Cómo iniciar un proyecto con NODAXIS">
            <p class="hero-aside-title">Para empezar, cuéntanos:</p>
            <ol class="hero-prompt-list">
                <li><span>01</span><p>Qué áreas quieres conectar</p></li>
                <li><span>02</span><p>Cuántas personas y equipos usan la red</p></li>
                <li><span>03</span><p>Qué falla o qué quieres mejorar</p></li>
            </ol>
            <a href="{{ url('/cotizar') }}">Compartir los detalles <span aria-hidden="true">↗</span></a>
        </aside>
    </div>
</section>

<section class="solutions section-space" id="soluciones" aria-labelledby="solutions-title">
    <div class="shell">
        <div class="section-heading">
            <div><p class="eyebrow">En qué te ayudamos</p><h2 id="solutions-title">Tres frentes de una red empresarial.</h2></div>
            <p>Describe el espacio, los equipos y el uso. Con esa información podemos conversar sobre el alcance del proyecto.</p>
        </div>
        <div class="solution-grid">
            <article class="solution-card"><span class="solution-index">01 / CONEXIÓN POR CABLE</span><h3>Red cableada</h3><p>Conecta puestos de trabajo, impresoras y puntos de acceso mediante cableado y switches.</p><a class="text-link" href="{{ url('/cotizar?categoria=redes') }}">Cotizar red cableada <span aria-hidden="true">↗</span></a></article>
            <article class="solution-card"><span class="solution-index">02 / COBERTURA</span><h3>Wi‑Fi para tus espacios</h3><p>Cuéntanos dónde se conectan las personas y qué áreas necesitan cobertura.</p><a class="text-link" href="{{ url('/cotizar?categoria=wifi') }}">Cotizar Wi‑Fi <span aria-hidden="true">↗</span></a></article>
            <article class="solution-card"><span class="solution-index">03 / CONTROL DE RED</span><h3>Router y firewall</h3><p>Revisa opciones para administrar la conexión a internet y los accesos de tu red.</p><a class="text-link" href="{{ url('/cotizar?categoria=seguridad') }}">Consultar seguridad <span aria-hidden="true">↗</span></a></article>
        </div>
    </div>
</section>

<section class="catalog section-space" id="catalogo" aria-labelledby="catalog-title">
    @php($catalogItems = config('catalog'))
    <div class="shell">
        <div class="section-heading catalog-heading">
            <div><p class="eyebrow">Equipos</p><h2 id="catalog-title">Arma tu lista para cotizar.</h2></div>
            <p>Busca por categoría o nombre. Si no sabes qué equipo necesitas, cuéntanos qué quieres conectar.</p>
        </div>
        <div class="catalog-controls">
            <div class="filter-pills" role="group" aria-label="Filtrar equipos">
                <button class="filter-pill is-active" type="button" data-filter="todos" aria-pressed="true">Todos</button>
                <button class="filter-pill" type="button" data-filter="conectividad" aria-pressed="false">Conectividad</button>
                <button class="filter-pill" type="button" data-filter="seguridad" aria-pressed="false">Seguridad</button>
                <button class="filter-pill" type="button" data-filter="infraestructura" aria-pressed="false">Infraestructura</button>
            </div>
            <label class="catalog-search"><span class="sr-only">Buscar equipos</span><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.2"/><path d="m15.5 15.5 5 5"/></svg><input type="search" placeholder="Buscar equipo" data-catalog-search></label>
        </div>
        <div class="catalog-grid" data-catalog-grid>
            @foreach($catalogItems as $slug => $item)
                <article class="catalog-card" data-category="{{ $item['group'] }}" data-name="{{ $item['search'] }}" data-slug="{{ $slug }}">
                    <div class="catalog-card-top"><span class="catalog-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><span class="catalog-tag">{{ $item['group_label'] }}</span></div>
                    <h3>{{ $item['name'] }}</h3>
                    <p>{{ $item['summary'] }}</p>
                    <div class="catalog-card-actions"><button type="button" data-feature-open="{{ $slug }}">Ver detalles <span aria-hidden="true">↗</span></button><button type="button" data-quote-item="{{ $slug }}" aria-pressed="false">Añadir <span aria-hidden="true">+</span></button></div>
                </article>
            @endforeach
        </div>
        <p class="empty-catalog" data-catalog-empty hidden>No encontramos equipos con ese nombre. Prueba otra búsqueda.</p>
        @foreach($catalogItems as $slug => $item)
            <template data-detail-guide="{{ $slug }}">@foreach($item['questions'] as $question)<li>{{ $question }}</li>@endforeach</template>
        @endforeach
        <dialog class="catalog-dialog" data-catalog-dialog aria-labelledby="catalog-dialog-title">
            <button class="catalog-dialog-close" type="button" data-detail-close aria-label="Cerrar detalles">×</button>
            <div class="catalog-dialog-copy"><p class="eyebrow" data-detail-group>Conectividad</p><h2 id="catalog-dialog-title" data-detail-title>Switches</h2><p class="catalog-dialog-summary" data-detail-summary>Conecta computadoras, impresoras y puntos de acceso.</p><div class="catalog-dialog-guide"><h3>Datos que ayudan a elegir</h3><ul data-detail-questions></ul></div><div class="catalog-dialog-actions"><a class="button button-primary" data-detail-quote href="{{ url('/cotizar?intereses=switches') }}">Solicitar cotización</a></div></div>
        </dialog>
        <div class="quote-dock" data-quote-dock hidden><span><strong data-quote-count>0</strong> <span data-quote-label>tipos de equipo</span> seleccionados</span><a class="button button-primary" data-quote-go href="{{ url('/cotizar') }}">Continuar con la cotización</a><button type="button" data-quote-clear aria-label="Vaciar selección">Vaciar</button></div>
    </div>
</section>

<section class="process section-space" id="proceso" aria-labelledby="process-title">
    <div class="shell">
        <div class="section-heading"><div><p class="eyebrow">Cómo trabajamos</p><h2 id="process-title">De tu necesidad a una propuesta.</h2></div><p>Una cotización útil empieza con los datos de tu espacio. No hace falta conocer los nombres técnicos de los equipos.</p></div>
        <ol class="process-list">
            <li><span>01</span><div><h3>Nos cuentas el proyecto</h3><p>Ubicación, áreas, cantidad de usuarios y qué necesitas resolver.</p></div></li>
            <li><span>02</span><div><h3>Revisamos el alcance</h3><p>Conversamos sobre cobertura, conexiones y equipos que intervienen.</p></div></li>
            <li><span>03</span><div><h3>Preparamos la cotización</h3><p>Te presentamos una propuesta para el proyecto que describiste.</p></div></li>
        </ol>
    </div>
</section>

<section class="engagement section-space" aria-label="Novedades y referidos">
    <div class="shell engagement-grid">
        <div class="newsletter" id="boletin" aria-labelledby="newsletter-title">
            <p class="eyebrow">Pulso de red</p><h2 id="newsletter-title">Ideas prácticas para tus redes.</h2><p>Guías breves sobre Wi‑Fi, cableado, seguridad y equipos. Para sumarte, solicita la suscripción por correo.</p>
            <a class="text-link" href="mailto:ac23014@ues.edu.sv?subject=Suscripci%C3%B3n%20a%20Pulso%20de%20red">Solicitar suscripción <span aria-hidden="true">↗</span></a>
        </div>
        <div class="affiliate" id="afiliados">
            <p class="eyebrow">Referidos</p><h2>¿Conoces un proyecto de redes?</h2><p>Consulta el programa de afiliados y sus condiciones antes de presentar una referencia. La comisión anunciada es del 10%.</p>
            <a class="text-link" href="https://wa.me/50372311719?text=Hola%2C%20quiero%20consultar%20las%20condiciones%20del%20programa%20de%20referidos%20NODAXIS." target="_blank" rel="noopener">Consultar por WhatsApp <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>

<section class="contact-section section-space" id="contacto" aria-labelledby="contact-title">
    <div class="shell contact-layout">
        <div><p class="eyebrow">NODAXIS · El Salvador</p><h2 id="contact-title">Hablemos de tu red.</h2><p>Atención a empresas e instituciones en El Salvador. Cuéntanos tu necesidad y el lugar del proyecto.</p><a class="button button-primary" href="{{ url('/cotizar') }}">Solicitar cotización</a></div>
        <div class="contact-options"><p>Si prefieres, escríbenos directamente:</p><a href="https://wa.me/50372311719" target="_blank" rel="noopener">WhatsApp <span>+503 7231 1719</span></a><a href="mailto:ac23014@ues.edu.sv">ac23014@ues.edu.sv</a><a href="mailto:rh23015@ues.edu.sv">rh23015@ues.edu.sv</a><a href="mailto:rg22023@ues.edu.sv">rg22023@ues.edu.sv</a></div>
    </div>
</section>
@endsection
