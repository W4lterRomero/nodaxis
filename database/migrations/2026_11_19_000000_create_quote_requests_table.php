<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 150);
            $table->string('nombre', 150);
            $table->string('email', 254);
            $table->string('telefono', 40)->nullable();
            $table->string('ubicacion', 180);
            $table->text('mensaje');
            $table->json('categorias');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
