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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();


            $table->string('motivo', length:100);
            $table->string('estado', length:100);

            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('especialidad_id');
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
