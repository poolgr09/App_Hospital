<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('cedula')->unique();
            $table->string('nombres', length:100);
            $table->string('apellidos', length:100);
            $table->string('edad', length:10);
            $table->string('genero', length:10);
            $table->string('celular', length:20);
            $table->string('fecha_nacimiento', length:100);
            $table->string('direccion', length:255);
            $table->string('tipo_sangre', length:255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
