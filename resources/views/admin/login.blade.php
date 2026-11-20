<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Acceso comercial | NODAXIS</title>
    <link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
</head>
<body class="admin-body admin-login-page">
    <main class="admin-login-card">
        <img src="{{ asset('assets/brand/nodaxis-logo.png') }}" alt="NODAXIS" width="180" height="54">
        <p class="admin-eyebrow">Área comercial</p>
        <h1>Acceso al panel</h1>
        <p>Consulta y organiza las solicitudes de cotización.</p>

        @if ($errors->any())
            <div role="alert">
                <p>No pudimos iniciar sesión. Revisa los datos e inténtalo de nuevo.</p>
            </div>
        @endif

        <form method="post" action="{{ route('admin.login.store') }}">
            @csrf
            <div class="admin-field">
                <label for="email">Correo electrónico</label>
                <input id="email" name="email" type="email" autocomplete="username" required value="{{ old('email') }}">
            </div>
            <div class="admin-field">
                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
            </div>
            <button class="admin-button" type="submit">Entrar al panel</button>
        </form>
        <p><a href="{{ url('/') }}">Volver al sitio</a></p>
    </main>
</body>
</html>
