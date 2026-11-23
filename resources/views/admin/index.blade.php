<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Solicitudes de cotización | NODAXIS</title>
    <link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
</head>
<body class="admin-body">
    <header class="admin-header">
        <div class="admin-header-inner"><a href="{{ route('admin.index') }}"><img src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS" width="180" height="54"></a><span>Área comercial</span></div>
        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </header>
    <main class="admin-main">
        <p class="admin-eyebrow">Seguimiento comercial</p>
        <h1>Solicitudes de cotización</h1>
        @if (session('status_updated'))
            <p role="status">Estado actualizado.</p>
        @endif
        @if ($errors->any())
            <p role="alert">No se pudo actualizar el estado. Selecciona una opción válida.</p>
        @endif

        <nav class="admin-filters" aria-label="Filtrar solicitudes">
            <a href="{{ route('admin.index') }}" @if (!$selectedStatus) aria-current="page" @endif>Todas</a>
            @foreach ($statuses as $status)
                <a href="{{ route('admin.index', ['estado' => $status]) }}" @if ($selectedStatus === $status) aria-current="page" @endif>
                    {{ match ($status) { 'nuevo' => 'Nuevas', 'en_revision' => 'En revisión', 'respondido' => 'Respondidas' } }}
                </a>
            @endforeach
        </nav>

        @forelse ($quotes as $quote)
            <article class="lead-card">
                <div class="lead-top"><h2>{{ $quote->empresa }}</h2><span class="lead-status lead-status-{{ $quote->estado }}">{{ match ($quote->estado) { 'nuevo' => 'Nuevo', 'en_revision' => 'En revisión', 'respondido' => 'Respondido' } }}</span></div>
                <p class="lead-contact"><strong>{{ $quote->nombre }}</strong> · <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                    @if ($quote->telefono) · <a href="tel:{{ preg_replace('/[^+0-9]/', '', $quote->telefono) }}">{{ $quote->telefono }}</a> @endif
                </p>
                <p>Ubicación: {{ $quote->ubicacion }} · Recibida: <time datetime="{{ $quote->created_at->toIso8601String() }}">{{ $quote->created_at->format('d/m/Y H:i') }}</time></p>
                <p>Categorías: {{ implode(', ', $quote->categorias ?? []) }}</p>
                @if ($quote->intereses)
                    <p>Equipos de interés: {{ implode(', ', $quote->intereses) }}</p>
                @endif
                <details>
                    <summary>Ver descripción de la necesidad</summary>
                    <p style="white-space:pre-wrap">{{ $quote->mensaje }}</p>
                </details>
                <form class="lead-state-form" method="post" action="{{ route('admin.quotes.status', $quote) }}">
                    @csrf
                    @method('PATCH')
                    <label for="estado-{{ $quote->id }}">Estado</label>
                    <select id="estado-{{ $quote->id }}" name="estado">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" @selected($quote->estado === $status)>
                                {{ match ($status) { 'nuevo' => 'Nuevo', 'en_revision' => 'En revisión', 'respondido' => 'Respondido' } }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Guardar estado</button>
                </form>
            </article>
        @empty
            <p>Todavía no hay solicitudes en este filtro.</p>
        @endforelse

        {{ $quotes->links() }}

        <section class="admin-newsletter" aria-labelledby="newsletter-admin-title">
            <div class="admin-section-heading"><div><p class="admin-eyebrow">Pulso de red</p><h2 id="newsletter-admin-title">Suscriptores activos</h2></div><a class="admin-export" href="{{ route('admin.newsletter.export') }}">Descargar CSV</a></div>
            <p>Solo aparecen correos que dieron consentimiento y no solicitaron la baja.</p>
            @forelse ($subscribers as $subscriber)
                <div class="subscriber-row"><a href="mailto:{{ $subscriber->email }}">{{ $subscriber->email }}</a><time datetime="{{ $subscriber->created_at->toIso8601String() }}">{{ $subscriber->created_at->format('d/m/Y') }}</time></div>
            @empty
                <p>Aún no hay suscriptores activos.</p>
            @endforelse
            {{ $subscribers->links() }}
        </section>
    </main>
</body>
</html>
