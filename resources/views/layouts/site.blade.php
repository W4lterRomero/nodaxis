<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102439">
    <meta name="description" content="Cotiza redes cableadas, Wi‑Fi y equipos de conectividad para empresas e instituciones en El Salvador con NODAXIS.">
    <title>@yield('title', 'NODAXIS | Redes empresariales en El Salvador')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<a class="skip-link" href="#contenido">Ir al contenido</a>
<header class="site-header" id="inicio">
    <div class="header-inner shell">
        <a class="brand" href="{{ url('/') }}" aria-label="NODAXIS, inicio"><img src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS · Ingeniería de redes" width="180" height="54"></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menú"><span></span><span></span><span></span></button>
        <nav class="main-nav" id="main-nav" aria-label="Navegación principal">
            <a href="{{ url('/#soluciones') }}">Soluciones</a>
            <a href="{{ url('/#catalogo') }}">Equipos</a>
            <a href="{{ url('/#proceso') }}">Cómo trabajamos</a>
            <a href="{{ url('/#contacto') }}">Contacto</a>
            <a class="nav-cta" href="{{ url('/cotizar') }}">Cotizar</a>
        </nav>
    </div>
</header>
<main id="contenido">@yield('content')</main>
<footer class="site-footer">
    <div class="shell footer-grid">
        <div class="footer-brand"><a class="brand" href="{{ url('/') }}"><img class="footer-logo" src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS · Ingeniería de redes" width="180" height="54"></a><p>Redes empresariales en El Salvador.</p></div>
        <div class="footer-links"><p class="footer-title">Explorar</p><a href="{{ url('/#soluciones') }}">Soluciones</a><a href="{{ url('/#catalogo') }}">Equipos</a><a href="{{ url('/#proceso') }}">Cómo trabajamos</a><a href="{{ url('/#boletin') }}">Pulso de red</a><a href="{{ url('/#afiliados') }}">Programa de referidos</a></div>
        <div class="footer-contact"><p class="footer-title">Contacto</p><a href="{{ url('/cotizar') }}">Solicitar cotización</a><a href="https://wa.me/50372311719" target="_blank" rel="noopener">WhatsApp · +503 7231 1719</a><a href="mailto:ac23014@ues.edu.sv">ac23014@ues.edu.sv</a><a href="mailto:rh23015@ues.edu.sv">rh23015@ues.edu.sv</a><a href="mailto:rg22023@ues.edu.sv">rg22023@ues.edu.sv</a></div>
    </div>
    <div class="shell footer-bottom"><span>© {{ date('Y') }} NODAXIS · El Salvador</span><a href="{{ route('terms') }}">Términos y privacidad</a></div>
</footer>
<a class="whatsapp-float" href="https://wa.me/50372311719" target="_blank" rel="noopener" aria-label="Contactar a NODAXIS por WhatsApp"><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4a11.6 11.6 0 0 0-9.9 17.7L4.5 28l6.5-1.7A11.7 11.7 0 1 0 16 4Zm0 2.2a9.4 9.4 0 0 1 0 18.8c-1.6 0-3.1-.4-4.5-1.2l-.6-.3-3.8 1 1-3.7-.4-.6A9.4 9.4 0 0 1 16 6.2Zm-4 4.5c-.3 0-.7.1-1 .5-.3.3-1.1 1.1-1.1 2.6s1.1 3 1.2 3.2c.2.2 2.1 3.3 5.2 4.5 2.6 1 3.2.8 3.8.7.6-.1 1.9-.8 2.2-1.6.3-.8.3-1.5.2-1.6-.1-.1-.3-.2-.7-.4l-2.2-1.1c-.3-.1-.5-.2-.7.2l-1 1.2c-.2.2-.4.3-.7.1-.3-.1-1.4-.5-2.6-1.6-1-.9-1.6-2-1.8-2.3-.2-.3 0-.5.1-.7l.5-.6c.2-.2.3-.4.4-.6.1-.2 0-.5 0-.6l-1-2.3c-.2-.5-.4-.5-.7-.5Z"/></svg><span>WhatsApp</span></a>
</body>
</html>
