<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class QuoteRequestController extends Controller
{
    private const INTERESTS = ['switches', 'access-points', 'routers-firewalls', 'cableado'];

    public function create(Request $request): View
    {
        $requested = $request->query('intereses', []);
        $requested = is_array($requested) ? $requested : [$requested];
        $requested = array_filter($requested, 'is_string');

        return view('quote', [
            'selectedInterests' => array_values(array_unique(array_intersect(self::INTERESTS, $requested))),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'empresa' => ['required', 'string', 'max:150'],
            'nombre' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'telefono' => ['nullable', 'string', 'max:40'],
            'ubicacion' => ['required', 'string', 'max:180'],
            'mensaje' => ['required', 'string', 'min:10', 'max:5000'],
            'categorias' => ['required', 'array', 'min:1', 'max:6'],
            'categorias.*' => ['required', 'string', 'distinct', Rule::in([
                'redes', 'wifi', 'seguridad', 'cableado', 'soporte', 'equipos',
            ])],
            'intereses' => ['sometimes', 'array', 'max:4'],
            'intereses.*' => ['required', 'string', 'distinct', Rule::in(self::INTERESTS)],
            'website' => ['nullable', 'prohibited'],
        ]);

        unset($data['website']);
        $data['intereses'] ??= [];

        QuoteRequest::create($data);

        return redirect()->route('quotes.create')->with('quote_success', true);
    }
}
