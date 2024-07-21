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
        Schema::create('consultorios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', length:50);
            $table->string('nombre', length:100);
            $table->string('descripcion', length:100);
            $table->string('ubicacion', length:100);
            $table->boolean('activo')-> default(true);
            $table->date('fecha_asignacion')->nullable();

            $table->unsignedBigInteger('medico_id')->nullable();
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('especialidad_id')->nullable();
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultorios');
    }
};
