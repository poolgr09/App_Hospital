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
        Schema::create('triajs', function (Blueprint $table) {
            $table->id();

            $table->string('frecuencia_cardiaca', length:250);
            $table->string('frecuencia_respiratoria', length:250);
            $table->string('presion_arterial', length:250);
            $table->string('temperatura', length:250);
            $table->string('saturacion', length:250);
            $table->string('estado', length:250);

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triajs');
    }
};
