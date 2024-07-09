<?php

use App\Models\Especialidades;
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
        Schema::create('especialidad_medico', function (Blueprint $table) {
            $table->id();

            $table->foreignId('especialidad_id')->nullable()->constrained('especialidades')-> cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('medico_id')->nullable()->constrained('medicos')-> cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidad_medico');
    }
};
