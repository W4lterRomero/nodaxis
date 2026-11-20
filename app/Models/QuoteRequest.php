<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'empresa', 'nombre', 'email', 'telefono', 'ubicacion', 'mensaje', 'categorias', 'intereses', 'estado',
    ];

    protected function casts(): array
    {
        return ['categorias' => 'array', 'intereses' => 'array'];
    }
}
