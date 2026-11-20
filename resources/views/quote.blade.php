@extends('layouts.site')

@section('title', 'Solicitar cotización | NODAXIS')

@section('content')
@php
    $selectedCategories = old('categorias', request('categoria') ? [request('categoria')] : (!empty($selectedInterests) ? ['equipos'] : []));
    $categoryOptions = [
        'redes' => 'Redes empresariales',
        'wifi' => 'Cobertura Wi-Fi',
        'seguridad' => 'Seguridad perimetral',
        'cableado' => 'Cableado e infraestructura',
        'soporte' => 'Soporte y mantenimiento',
        'equipos' => 'Equipos',
    ];
    $interestOptions = collect(config('catalog'))->mapWithKeys(fn ($item, $slug) => [$slug => $item['name']])->all();
    $chosenInterests = old('intereses', $selectedInterests ?? []);
@endphp
<section class="quote-hero shell"><a class="back-link" href="{{ url('/') }}">← Volver al inicio</a><p class="eyebrow">Hablemos de tu proyecto</p><h1>Tu siguiente red<br><em>comienza aquí.</em></h1><p>Cuéntanos lo necesario para preparar una propuesta técnica y comercial adaptada a tu espacio.</p></section>
<section class="quote-section shell"><div class="quote-aside"><div class="aside-card"><p class="micro-label">QUÉ SUCEDE DESPUÉS</p><div class="aside-step"><span>01</span><p>Recibimos los datos de tu necesidad.</p></div><div class="aside-step"><span>02</span><p>Revisamos el alcance y las condiciones del sitio.</p></div><div class="aside-step"><span>03</span><p>Te contactamos para completar la información y preparar la cotización.</p></div><div class="aside-rule"></div><p class="aside-contact">También puedes escribir a <a href="mailto:ac23015@ues.edu.sv">ac23015@ues.edu.sv</a></p></div></div>
    <div class="quote-form-wrap">
        @if(session('quote_success'))<div class="form-success" role="status"><strong>Solicitud registrada.</strong><span>Gracias. Tu información quedó guardada en esta versión local del sitio.</span></div>@endif
        @if($errors->any())<div class="form-errors" role="alert"><strong>Revisa los campos marcados.</strong><span>Falta información necesaria para registrar la solicitud.</span></div>@endif
        <form class="quote-form" action="{{ route('quotes.store') }}" method="post" novalidate>
            @csrf
            <div class="form-heading"><span class="form-counter">01 / 03</span><h2>Sobre tu organización</h2></div>
            <div class="form-grid"><div class="field"><label for="empresa">Empresa o institución <span>*</span></label><input id="empresa" name="empresa" type="text" value="{{ old('empresa') }}" autocomplete="organization" required maxlength="150" placeholder="Nombre de la organización" @error('empresa') aria-invalid="true" aria-describedby="error-empresa" @enderror>@error('empresa')<small id="error-empresa">{{ $message }}</small>@enderror</div><div class="field"><label for="ubicacion">Ubicación del proyecto <span>*</span></label><input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion') }}" autocomplete="address-level2" required maxlength="180" placeholder="Municipio o departamento" @error('ubicacion') aria-invalid="true" aria-describedby="error-ubicacion" @enderror>@error('ubicacion')<small id="error-ubicacion">{{ $message }}</small>@enderror</div></div>
            <div class="form-heading"><span class="form-counter">02 / 03</span><h2>Qué necesitas</h2></div>
            <fieldset class="category-field"><legend>Selecciona una o más opciones <span>*</span></legend><div class="category-options">@foreach($categoryOptions as $slug => $label)<label class="category-option"><input type="checkbox" name="categorias[]" value="{{ $slug }}" @checked(in_array($slug, (array) $selectedCategories, true))><span>{{ $label }}</span></label>@endforeach</div>@error('categorias')<small>{{ $message }}</small>@enderror @error('categorias.*')<small>{{ $message }}</small>@enderror</fieldset>
            <fieldset class="category-field interest-field"><legend>Equipos que te interesan <span class="optional">opcional</span></legend><div class="category-options">@foreach($interestOptions as $slug => $label)<label class="category-option"><input type="checkbox" name="intereses[]" value="{{ $slug }}" @checked(in_array($slug, (array) $chosenInterests, true))><span>{{ $label }}</span></label>@endforeach</div>@error('intereses')<small>{{ $message }}</small>@enderror @error('intereses.*')<small>{{ $message }}</small>@enderror</fieldset>
            <div class="field field-message"><label for="mensaje">Describe tu proyecto <span>*</span></label><textarea id="mensaje" name="mensaje" rows="5" minlength="10" maxlength="5000" required placeholder="¿Qué deseas conectar, mejorar o resolver? Puedes incluir cantidad aproximada de usuarios, sitios y plazos." @error('mensaje') aria-invalid="true" aria-describedby="error-mensaje" @enderror>{{ old('mensaje') }}</textarea>@error('mensaje')<small id="error-mensaje">{{ $message }}</small>@enderror</div>
            <div class="form-heading"><span class="form-counter">03 / 03</span><h2>Cómo te contactamos</h2></div>
            <div class="form-grid"><div class="field"><label for="nombre">Nombre de contacto <span>*</span></label><input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" autocomplete="name" required maxlength="150" placeholder="Tu nombre" @error('nombre') aria-invalid="true" aria-describedby="error-nombre" @enderror>@error('nombre')<small id="error-nombre">{{ $message }}</small>@enderror</div><div class="field"><label for="email">Correo electrónico <span>*</span></label><input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required maxlength="254" placeholder="tu@empresa.com" @error('email') aria-invalid="true" aria-describedby="error-email" @enderror>@error('email')<small id="error-email">{{ $message }}</small>@enderror</div></div>
            <div class="field"><label for="telefono">Teléfono <span class="optional">opcional</span></label><input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" autocomplete="tel" maxlength="40" placeholder="Con código de país, si corresponde" @error('telefono') aria-invalid="true" aria-describedby="error-telefono" @enderror>@error('telefono')<small id="error-telefono">{{ $message }}</small>@enderror</div>
            <div class="honeypot" aria-hidden="true"><label for="website">Sitio web</label><input id="website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
            <div class="form-submit"><p>Los campos marcados con * son obligatorios. En este prototipo local, la solicitud se guarda en la base de datos del equipo.</p><button class="button button-primary" type="submit">Registrar solicitud</button></div>
        </form>
    </div>
</section>
@endsection
