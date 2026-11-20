@extends('layouts.site')

@section('content')
<section class="hero shell" aria-labelledby="hero-title">
    <div class="hero-copy" data-reveal>
        <p class="eyebrow"><span class="eyebrow-line"></span> Ingeniería de redes · El Salvador</p>
        <h1 id="hero-title">Una red que<br><em>impulsa</em> tu operación.</h1>
        <p class="hero-intro">Conectividad, seguridad y soporte para empresas e instituciones. Explora una solución, define lo que necesitas y solicita una propuesta clara.</p>
        <div class="hero-actions"><a class="button button-primary" href="{{ url('/cotizar') }}">Solicitar cotización</a><a class="text-link" href="#soluciones">Explorar soluciones <span aria-hidden="true">↓</span></a></div>
        <div class="hero-note"><span class="note-mark" aria-hidden="true"></span><span>Diseño según el alcance real de cada proyecto.</span></div>
    </div>
    <div class="hero-experience" data-reveal data-showcase aria-label="Explorador de soluciones">
        <div class="experience-head"><span class="micro-label">EXPLORA NODAXIS</span><span class="live-indicator"><i aria-hidden="true"></i> Vista interactiva</span></div>
        <div class="experience-tabs" role="tablist" aria-label="Tipo de solución">
            <button class="experience-tab is-active" type="button" role="tab" aria-selected="true" data-mode="redes" id="tab-redes" aria-controls="panel-solucion">Redes</button>
            <button class="experience-tab" type="button" role="tab" aria-selected="false" data-mode="wifi" id="tab-wifi" aria-controls="panel-solucion">Wi-Fi</button>
            <button class="experience-tab" type="button" role="tab" aria-selected="false" data-mode="seguridad" id="tab-seguridad" aria-controls="panel-solucion">Seguridad</button>
        </div>
        <div class="experience-stage" id="panel-solucion" role="tabpanel" aria-labelledby="tab-redes">
            <div class="stage-grid" aria-hidden="true"></div>
            <div class="stage-orbit stage-orbit-a" aria-hidden="true"></div><div class="stage-orbit stage-orbit-b" aria-hidden="true"></div>
            <img class="stage-product" data-stage-image src="{{ asset('assets/catalog/switch.webp') }}" alt="Representación conceptual de un switch empresarial" width="1200" height="900">
            <div class="stage-chip stage-chip-top"><span class="chip-dot"></span> Equipos según necesidad</div>
            <div class="stage-chip stage-chip-bottom"><span class="chip-mini-icon" aria-hidden="true">↗</span> Diseño + implementación</div>
        </div>
        <div class="experience-detail"><div><span class="micro-label">SOLUCIÓN EXPLORADA</span><h2 data-stage-title>Redes empresariales</h2><p data-stage-copy>Conecta áreas, equipos y usuarios con una arquitectura pensada para crecer.</p></div><a data-stage-link href="{{ url('/cotizar?categoria=redes') }}" aria-label="Cotizar redes empresariales">Cotizar <span aria-hidden="true">↗</span></a></div>
        <div class="experience-progress" aria-hidden="true"><span class="is-active"></span><span></span><span></span></div>
    </div>
</section>

<div class="section-divider shell" aria-hidden="true"><span></span><span>01 / SOLUCIONES</span></div>

<section class="solutions section-space" id="soluciones" aria-labelledby="solutions-title">
    <div class="shell"><div class="section-heading" data-reveal><div><p class="eyebrow">Soluciones conectadas</p><h2 id="solutions-title">Cada espacio pide<br>una red distinta.</h2></div><p>Selecciona una línea para visualizar su enfoque. La propuesta final se define con tus requisitos, sitio y operación.</p></div>
        <div class="solution-grid">
            <a class="solution-card solution-card-dark" href="{{ url('/cotizar?categoria=redes') }}" data-reveal><span class="card-index">CONECTIVIDAD</span><div class="solution-icon icon-network" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></div><h3>Redes empresariales</h3><p>Diseño e implementación de infraestructura cableada para una operación estable.</p><span class="card-action">Explorar propuesta <span aria-hidden="true">↗</span></span></a>
            <a class="solution-card solution-card-blue" href="{{ url('/cotizar?categoria=wifi') }}" data-reveal><span class="card-index">MOVILIDAD</span><div class="solution-icon icon-wifi" aria-hidden="true"><i></i><i></i><i></i></div><h3>Cobertura Wi-Fi</h3><p>Conectividad inalámbrica planificada para los espacios y usuarios que la necesitan.</p><span class="card-action">Explorar propuesta <span aria-hidden="true">↗</span></span></a>
            <a class="solution-card solution-card-light" href="{{ url('/cotizar?categoria=seguridad') }}" data-reveal><span class="card-index">CONTROL</span><div class="solution-icon icon-shield" aria-hidden="true">◆</div><h3>Seguridad perimetral</h3><p>Enrutamiento y control de acceso definidos a partir de tus enlaces y requisitos.</p><span class="card-action">Explorar propuesta <span aria-hidden="true">↗</span></span></a>
        </div>
    </div>
</section>

<section class="architecture section-space" aria-labelledby="architecture-title">
    <div class="shell architecture-layout"><div class="architecture-copy" data-reveal><p class="eyebrow">Pensado como sistema</p><h2 id="architecture-title">Más que conectar equipos: conectar decisiones.</h2><p>Partimos de la ubicación, la cantidad de usuarios y los objetivos de tu operación. Con esa información se plantea una arquitectura y un alcance de implementación.</p><a class="text-link" href="{{ url('/cotizar') }}">Iniciar una conversación <span aria-hidden="true">↗</span></a></div>
        <div class="network-map" aria-label="Diagrama ilustrativo de una red que conecta sede, usuarios y seguridad" data-reveal><div class="map-label">VISTA DE ARQUITECTURA</div><svg viewBox="0 0 600 360" aria-hidden="true" preserveAspectRatio="xMidYMid meet"><path class="map-line" d="M300 172 L115 88 M300 172 L490 88 M300 172 L116 278 M300 172 L490 278"/><path class="map-pulse" d="M300 172 L490 88"/><path class="map-pulse map-pulse-delay" d="M300 172 L116 278"/></svg><div class="map-node map-center"><span>CORE</span><b>N</b></div><div class="map-node map-n1"><span>01</span><b>Sede</b></div><div class="map-node map-n2"><span>02</span><b>Wi-Fi</b></div><div class="map-node map-n3"><span>03</span><b>Equipos</b></div><div class="map-node map-n4"><span>04</span><b>Control</b></div><div class="map-caption">Estructura visual orientativa · no representa una instalación real</div></div>
    </div>
</section>

<section class="catalog section-space" id="catalogo" aria-labelledby="catalog-title">
    @php($catalogItems = config('catalog'))
    <div class="shell"><div class="section-heading catalog-heading" data-reveal><div><p class="eyebrow">Equipos para cotizar</p><h2 id="catalog-title">Elige lo que tu red necesita.</h2></div><p>Explora familias de equipos y arma una solicitud. Las imágenes son ilustrativas; modelos y disponibilidad se confirman al cotizar.</p></div>
        <div class="catalog-feature" data-catalog-feature aria-label="Explorador visual de equipos">
            <div class="catalog-feature-top"><span class="micro-label">NODAXIS / EQUIPOS</span><span class="catalog-feature-count"><b data-feature-index>01</b> / 08</span></div>
            <div class="catalog-feature-tabs" role="tablist" aria-label="Familias de equipos">
                @foreach($catalogItems as $slug => $item)
                    <button type="button" class="catalog-feature-tab @if($loop->first) is-active @endif" role="tab" aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="catalog-feature-panel" id="feature-tab-{{ $slug }}" data-feature-tab="{{ $slug }}" data-feature-name="{{ $item['name'] }}" data-feature-summary="{{ $item['summary'] }}" data-feature-group-name="{{ $item['group_label'] }}" data-feature-image-src="{{ asset('assets/catalog/'.$item['image']) }}" tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $item['name'] }}</button>
                @endforeach
            </div>
            <div class="catalog-feature-body" id="catalog-feature-panel" role="tabpanel" aria-labelledby="feature-tab-switches">
                <div class="catalog-feature-copy"><span class="catalog-feature-kicker" data-feature-group>Conectividad / 01</span><h3 data-feature-title>Switches</h3><p data-feature-copy>Puertos y capacidad para conectar áreas, usuarios y servicios.</p><button type="button" class="catalog-feature-add" data-quote-item="switches" aria-pressed="false">Añadir a solicitud <span aria-hidden="true">↗</span></button><span class="catalog-feature-note">Imagen conceptual · equipo sujeto a cotización</span></div>
                <div class="catalog-feature-visual" data-feature-visual><span class="catalog-feature-orbit" aria-hidden="true"></span><span class="catalog-feature-glow" aria-hidden="true"></span><div class="catalog-feature-image-wrap"><img data-feature-image src="{{ asset('assets/catalog/switch.webp') }}" alt="Representación conceptual de un switch de red" width="1200" height="900" fetchpriority="low"></div><span class="catalog-feature-watermark" aria-hidden="true">N / 01</span></div>
            </div>
            <div class="catalog-feature-bottom"><span>Desliza o elige una familia</span><div><button type="button" data-feature-prev aria-label="Equipo anterior">←</button><button type="button" data-feature-next aria-label="Equipo siguiente">→</button></div></div>
        </div>
        <div class="catalog-controls"><div class="filter-pills" role="group" aria-label="Filtrar categorías"><button class="filter-pill is-active" type="button" data-filter="todos" aria-pressed="true">Todos</button><button class="filter-pill" type="button" data-filter="conectividad" aria-pressed="false">Conectividad</button><button class="filter-pill" type="button" data-filter="seguridad" aria-pressed="false">Seguridad</button><button class="filter-pill" type="button" data-filter="infraestructura" aria-pressed="false">Infraestructura</button></div><label class="catalog-search"><span class="sr-only">Buscar categorías</span><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.2"/><path d="m15.5 15.5 5 5"/></svg><input type="search" placeholder="Buscar equipo" data-catalog-search></label></div>
        <div class="catalog-grid" data-catalog-grid>
            @foreach($catalogItems as $slug => $item)
                <article class="catalog-card" data-category="{{ $item['group'] }}" data-name="{{ $item['search'] }}" data-slug="{{ $slug }}"><div class="catalog-media"><span class="catalog-tag">{{ $item['group_label'] }}</span><img src="{{ asset('assets/catalog/'.$item['image']) }}" alt="Representación conceptual de {{ strtolower($item['name']) }}" loading="lazy" width="600" height="450"></div><div class="catalog-info"><h3>{{ $item['name'] }}</h3><p>{{ $item['summary'] }}</p><div class="catalog-card-actions"><button type="button" data-feature-open="{{ $slug }}">Ver en detalle <span aria-hidden="true">↗</span></button><button type="button" data-quote-item="{{ $slug }}" aria-pressed="false">Añadir <span aria-hidden="true">+</span></button></div></div></article>
            @endforeach
        </div><p class="empty-catalog" data-catalog-empty hidden>No encontramos esa categoría. Prueba otra búsqueda.</p>
        <div class="quote-dock" data-quote-dock hidden><span><strong data-quote-count>0</strong> categorías para cotizar</span><a class="button button-primary" data-quote-go href="{{ url('/cotizar') }}">Continuar solicitud</a><button type="button" data-quote-clear aria-label="Vaciar selección">Vaciar</button></div>
    </div>
</section>

<section class="services section-space" id="servicios" aria-labelledby="services-title"><div class="shell services-layout"><div data-reveal><p class="eyebrow">Servicios NODAXIS</p><h2 id="services-title">Del diagnóstico a la operación.</h2><p>Podemos definir el alcance contigo desde el primer contacto. Cada etapa se ajusta al proyecto.</p><a class="button button-outline" href="{{ url('/cotizar') }}">Hablar de mi proyecto</a></div><div class="service-list"><div class="service-row" data-reveal><span>01</span><div><h3>Diseño e implementación</h3><p>Arquitectura de red, selección de componentes e instalación según objetivos.</p></div></div><div class="service-row" data-reveal><span>02</span><div><h3>Seguridad y optimización</h3><p>Revisión de conectividad, segmentación y puntos de mejora.</p></div></div><div class="service-row" data-reveal><span>03</span><div><h3>Soporte y mantenimiento</h3><p>Acompañamiento técnico para mantener la infraestructura operativa.</p></div></div></div></div></section>

<section class="about-cta section-space" id="nosotros" aria-labelledby="about-title"><div class="shell about-inner" data-reveal><div><p class="eyebrow">NODAXIS</p><h2 id="about-title">Tecnología que se entiende. Redes que trabajan.</h2></div><div><p>Hacemos que una necesidad técnica se convierta en un proyecto claro: qué se quiere conectar, dónde y para quién. La cotización parte de esos datos, sin prometer productos ni condiciones que aún no se han confirmado.</p><a class="button button-primary" href="{{ url('/cotizar') }}">Cuéntanos qué necesitas</a></div></div></section>
@endsection
