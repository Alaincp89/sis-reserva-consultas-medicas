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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('direccion',255);
            $table->string('telefono',100);
            $table->string('ciudad',100);
            $table->string('cedula')->unique();                      
            $table->string('num_seguridad_social',100);
            $table->string('num_colegiado',100);
            $table->string('tipo_medico',100);            

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
