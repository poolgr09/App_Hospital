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
        Schema::create('secretarias', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('nombres', length:100);
            $table->string('apellidos', length:100);
            $table->string('celular', length:100);
            $table->string('fecha_nacimiento', length:100);
            $table->string('direccion', length:255);

            $table->unsignedBigInteger(column:'user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretarias');
    }
};
