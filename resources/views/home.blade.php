@extends('layouts.site')

@section('content')
<section class="hero-cinema" aria-labelledby="hero-title">
    <div class="hero-cinema-inner shell">
        <div class="hero-copy" data-reveal>
            <p class="hero-breadcrumb">Equipos <span aria-hidden="true">/</span> Conectividad</p>
            <h1 id="hero-title">Switches para redes empresariales</h1>
            <p class="hero-intro">Conecte áreas, usuarios y servicios. La selección depende de los puertos, la alimentación y el crecimiento que necesita su red.</p>
            <div class="hero-actions"><a class="button button-primary" href="{{ url('/cotizar?intereses=switches') }}">Cotizar switches</a><a class="hero-secondary" href="#catalogo">Ver catálogo</a></div>
        </div>
        <figure class="hero-product-scene" data-reveal>
            <img src="{{ asset('assets/catalog/switch.webp') }}" alt="Imagen conceptual de un switch para redes empresariales" width="1200" height="900" fetchpriority="high">
            <figcaption>Representación conceptual · modelo sujeto a cotización</figcaption>
            <span class="hero-product-index" aria-hidden="true">Conectividad / 01</span>
        </figure>
    </div>
</section>

<section class="showcase-section section-space" id="experiencia" aria-labelledby="showcase-title">
    <div class="shell">
    <div class="showcase-heading" data-reveal><p class="eyebrow">Un sistema. Varias necesidades.</p><h2 id="showcase-title">Conecta lo que importa.</h2><p>Explora cómo se relacionan redes, Wi-Fi y seguridad. Cada propuesta se define según la ubicación y el alcance real del proyecto.</p></div>
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
    </div>
</section>

<div class="section-divider shell" aria-hidden="true"><span></span><span>01 / SOLUCIONES</span></div>

<section class="solutions section-space" id="soluciones" aria-labelledby="solutions-title">
    <div class="shell"><div class="section-heading" data-reveal><div><p class="eyebrow">Soluciones conectadas</p><h2 id="solutions-title">Cada espacio pide<br>una red distinta.</h2></div><p>Selecciona una línea para visualizar su enfoque. La propuesta final se define con tus requisitos, sitio y operación.</p></div>
        <div class="solution-grid">
            <a class="solution-card solution-card-dark" href="{{ url('/cotizar?categoria=redes') }}" data-reveal><span class="card-index">CONECTIVIDAD / REDES EMPRESARIALES</span><div class="solution-visual"><img src="{{ asset('assets/catalog/switch.webp') }}" alt="Imagen conceptual de un switch para redes empresariales" width="1200" height="900" loading="lazy"></div><div class="solution-copy"><h3>La red que conecta tu operación.</h3><p>Infraestructura cableada diseñada en función de tus áreas, usuarios y equipos.</p><span class="card-action">Explorar redes</span></div></a>
            <a class="solution-card solution-card-blue" href="{{ url('/cotizar?categoria=wifi') }}" data-reveal><span class="card-index">MOVILIDAD / WI-FI</span><div class="solution-visual"><img src="{{ asset('assets/catalog/wifi.webp') }}" alt="Imagen conceptual de puntos de acceso Wi-Fi" width="1200" height="900" loading="lazy"></div><div class="solution-copy"><h3>Cobertura pensada para el espacio.</h3><p>Planifica la conexión según distribución y demanda.</p><span class="card-action">Explorar Wi-Fi</span></div></a>
            <a class="solution-card solution-card-light" href="{{ url('/cotizar?categoria=seguridad') }}" data-reveal><span class="card-index">CONTROL / SEGURIDAD PERIMETRAL</span><div class="solution-visual"><img src="{{ asset('assets/catalog/firewall.webp') }}" alt="Imagen conceptual de un equipo de seguridad perimetral" width="1200" height="900" loading="lazy"></div><div class="solution-copy"><h3>Control desde el perímetro.</h3><p>Enrutamiento y acceso definidos para tus requisitos.</p><span class="card-action">Explorar seguridad</span></div></a>
        </div>
    </div>
</section>

<section class="architecture hologram-section section-space" id="arquitectura" aria-labelledby="architecture-title">
    <div class="shell"><div class="hologram-heading" data-reveal><p class="eyebrow">Pensado como sistema</p><h2 id="architecture-title">Una red visible.<br>Una operación conectada.</h2><p>Explora las partes de una arquitectura empresarial. La distribución final se define con los datos de tu espacio y tus usuarios.</p></div>
        <div class="hologram-stage" data-hologram data-active="sede" aria-label="Explorador interactivo de arquitectura de red">
            <div class="hologram-visual" aria-hidden="true">@include('partials.network-hologram')</div>
            <div class="hologram-nodes" role="group" aria-label="Explorar componentes de la red">
                <button class="hologram-node is-active" type="button" data-holo-node="sede" aria-pressed="true"><span>01</span><b>Sede</b></button>
                <button class="hologram-node" type="button" data-holo-node="wifi" aria-pressed="false"><span>02</span><b>Wi-Fi</b></button>
                <button class="hologram-node" type="button" data-holo-node="equipos" aria-pressed="false"><span>03</span><b>Equipos</b></button>
                <button class="hologram-node" type="button" data-holo-node="control" aria-pressed="false"><span>04</span><b>Control</b></button>
            </div>
            <div class="hologram-detail" aria-live="polite"><span class="micro-label" data-holo-index>01 / SEDE</span><h3 data-holo-title>Una base para conectar.</h3><p data-holo-copy>La ubicación y la cantidad de usuarios orientan la distribución de la red.</p><a data-holo-link href="{{ url('/cotizar?categoria=redes') }}">Cotizar esta solución <span aria-hidden="true">↗</span></a></div>
            <p class="hologram-caption">Visualización orientativa · no representa una instalación real</p>
        </div>
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
        </div>
        <p class="empty-catalog" data-catalog-empty hidden>No encontramos esa categoría. Prueba otra búsqueda.</p>
        @foreach($catalogItems as $slug => $item)
            <template data-detail-guide="{{ $slug }}">@foreach($item['questions'] as $question)<li>{{ $question }}</li>@endforeach</template>
        @endforeach
        <dialog class="catalog-dialog" data-catalog-dialog aria-labelledby="catalog-dialog-title">
            <button class="catalog-dialog-close" type="button" data-detail-close aria-label="Cerrar ficha">×</button>
            <div class="catalog-dialog-layout">
                <div class="catalog-dialog-visual"><span class="micro-label">NODAXIS / EQUIPOS</span><img data-detail-image src="{{ asset('assets/catalog/switch.webp') }}" alt="Representación conceptual de un switch" width="1200" height="900"><span>Imagen conceptual · modelos sujetos a confirmación</span></div>
                <div class="catalog-dialog-copy"><p class="eyebrow" data-detail-group>Conectividad</p><h2 id="catalog-dialog-title" data-detail-title>Switches</h2><p class="catalog-dialog-summary" data-detail-summary>Puertos y capacidad para conectar áreas, usuarios y servicios.</p><div class="catalog-dialog-guide"><h3>Para dimensionar tu solicitud</h3><p>Comparte estos datos si los conoces. Podemos ayudarte a definirlos.</p><ul data-detail-questions></ul></div><div class="catalog-dialog-actions"><a class="button button-primary" data-detail-quote href="{{ url('/cotizar?intereses=switches') }}">Solicitar cotización</a><button type="button" data-detail-next>Ver otra familia</button></div></div>
            </div>
        </dialog>
        <div class="quote-dock" data-quote-dock hidden><span><strong data-quote-count>0</strong> <span data-quote-label>familias de equipos</span> para cotizar</span><a class="button button-primary" data-quote-go href="{{ url('/cotizar') }}">Continuar solicitud</a><button type="button" data-quote-clear aria-label="Vaciar selección">Vaciar</button></div>
    </div>
</section>

<section class="services section-space" id="servicios" aria-labelledby="services-title"><div class="shell services-layout"><div data-reveal><p class="eyebrow">Servicios NODAXIS</p><h2 id="services-title">Del diagnóstico a la operación.</h2><p>Podemos definir el alcance contigo desde el primer contacto. Cada etapa se ajusta al proyecto.</p><a class="button button-outline" href="{{ url('/cotizar') }}">Hablar de mi proyecto</a></div><div class="service-list"><div class="service-row" data-reveal><span>01</span><div><h3>Diseño e implementación</h3><p>Arquitectura de red, selección de componentes e instalación según objetivos.</p></div></div><div class="service-row" data-reveal><span>02</span><div><h3>Seguridad y optimización</h3><p>Revisión de conectividad, segmentación y puntos de mejora.</p></div></div><div class="service-row" data-reveal><span>03</span><div><h3>Soporte y mantenimiento</h3><p>Acompañamiento técnico para mantener la infraestructura operativa.</p></div></div></div></div></section>

<section class="about-cta section-space" id="nosotros" aria-labelledby="about-title"><div class="shell about-inner" data-reveal><div><p class="eyebrow">NODAXIS</p><h2 id="about-title">Tecnología que se entiende. Redes que trabajan.</h2></div><div><p>Hacemos que una necesidad técnica se convierta en un proyecto claro: qué se quiere conectar, dónde y para quién. La cotización parte de esos datos, sin prometer productos ni condiciones que aún no se han confirmado.</p><a class="button button-primary" href="{{ url('/cotizar') }}">Cuéntanos qué necesitas</a></div></div></section>
@endsection
