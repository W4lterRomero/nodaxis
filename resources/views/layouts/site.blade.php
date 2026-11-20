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
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menú"><span></span><span></span><span></span></button>
        <nav class="main-nav" id="main-nav" aria-label="Navegación principal">
            <a href="{{ url('/#soluciones') }}">Soluciones</a>
            <a href="{{ url('/#catalogo') }}">Equipos</a>
            <a href="{{ url('/#servicios') }}">Servicios</a>
            <a href="{{ url('/#nosotros') }}">Nosotros</a>
            <a class="nav-cta" href="{{ url('/cotizar') }}">Solicitar cotización</a>
        </nav>
    </div>
</header>
<main id="contenido">@yield('content')</main>
<footer class="site-footer">
    <div class="shell footer-grid">
        <div><img class="footer-logo" src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS" width="180" height="54"><p>Ingeniería de redes para empresas e instituciones en El Salvador.</p></div>
        <div><p class="footer-title">Explorar</p><a href="{{ url('/#soluciones') }}">Soluciones</a><a href="{{ url('/#catalogo') }}">Equipos</a><a href="{{ url('/#servicios') }}">Servicios</a></div>
        <div><p class="footer-title">Contacto</p><a href="{{ url('/cotizar') }}">Solicitar cotización</a><a href="mailto:ac23015@ues.edu.sv">ac23015@ues.edu.sv</a><p>El Salvador</p></div>
    </div>
    <div class="shell footer-bottom"><span>© {{ date('Y') }} NODAXIS. Conectamos el futuro.</span><span>Prototipo local · productos sujetos a confirmación</span></div>
</footer>
</body>
</html>
