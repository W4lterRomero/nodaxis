<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102439">
    <meta name="description" content="NODAXIS: diseño, implementación, seguridad y soporte de redes empresariales en El Salvador. Explora soluciones y solicita una cotización.">
    <title>@yield('title', 'NODAXIS | Ingeniería de redes en El Salvador')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<a class="skip-link" href="#contenido">Ir al contenido</a>
<header class="site-header" id="inicio">
    <div class="header-inner shell">
        <a class="brand" href="{{ url('/') }}" aria-label="NODAXIS, ir a inicio"><img src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS, ingeniería de redes" width="180" height="54"></a>
        <nav class="main-nav" id="main-nav" aria-label="Navegación principal">
            <a data-nav-link href="{{ url('/#soluciones') }}">Soluciones</a>
            <a data-nav-link href="{{ url('/#arquitectura') }}">Arquitectura</a>
            <div class="nav-mega" data-nav-mega>
                <button class="nav-mega-trigger" type="button" aria-expanded="false" aria-controls="equipment-menu">Equipos <span aria-hidden="true">⌄</span></button>
                <div class="nav-mega-panel" id="equipment-menu" hidden>
                    <div class="nav-mega-list" role="group" aria-label="Familias de equipos">
                        @foreach(config('catalog') as $slug => $item)
                            <a href="{{ url('/cotizar?intereses='.$slug) }}" data-mega-item="{{ $slug }}" data-mega-name="{{ $item['name'] }}" data-mega-summary="{{ $item['summary'] }}" data-mega-image="{{ asset('assets/catalog/'.$item['image']) }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                    <div class="nav-mega-preview" aria-live="polite"><img src="{{ asset('assets/catalog/switch.webp') }}" alt="Representación conceptual de switches" data-mega-preview-image><div><span class="micro-label">EXPLORAR EQUIPOS</span><h2 data-mega-preview-title>Switches</h2><p data-mega-preview-copy>Puertos y capacidad para conectar áreas, usuarios y servicios.</p><a href="{{ url('/#catalogo') }}">Ver catálogo</a></div></div>
                </div>
            </div>
            <a data-nav-link href="{{ url('/#servicios') }}">Servicios</a>
            <a data-nav-link href="{{ url('/#nosotros') }}">Nosotros</a>
        </nav>
        <div class="header-actions"><span class="header-region">El Salvador</span><a class="nav-cta" href="{{ url('/cotizar') }}">Cotizar <span aria-hidden="true">↗</span></a><button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menú"><span></span><span></span><span></span></button></div>
    </div>
    <div class="header-progress" aria-hidden="true"><span data-scroll-progress></span></div>
</header>
<main id="contenido">@yield('content')</main>
<footer class="site-footer">
    <div class="shell footer-grid">
        <div><img class="footer-logo" src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS" width="180" height="54"><p>Ingeniería de redes para empresas e instituciones en El Salvador.</p></div>
        <div><p class="footer-title">Explorar</p><a href="{{ url('/#soluciones') }}">Soluciones</a><a href="{{ url('/#arquitectura') }}">Arquitectura</a><a href="{{ url('/#catalogo') }}">Equipos</a><a href="{{ url('/#servicios') }}">Servicios</a></div>
        <div><p class="footer-title">Contacto</p><a href="{{ url('/cotizar') }}">Solicitar cotización</a><a href="mailto:ac23015@ues.edu.sv">ac23015@ues.edu.sv</a><p>El Salvador</p></div>
    </div>
    <div class="shell footer-bottom"><span>© {{ date('Y') }} NODAXIS. Conectamos el futuro.</span><span>Prototipo local · productos sujetos a confirmación</span></div>
</footer>
</body>
</html>
