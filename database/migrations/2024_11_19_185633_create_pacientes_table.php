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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('direccion',255);           
            $table->string('Telefono',100);
            $table->string('codigo_postal',100);
            $table->string('cedula')->unique();
            $table->string('num_seguridad_social',100);


             // Relacion con la tabla users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Relacion con la tabla medicos
            $table->unsignedBigInteger('medico_id')->nullable(); 
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
