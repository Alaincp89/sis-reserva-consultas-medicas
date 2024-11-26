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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia',100);
            $table->time('hora_inicio');
            $table->time('hora_fin');

            // Relacion con la tabla medicos
            $table->unsignedBigInteger('medico_id')->nullable(); 
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('set null');

            // Relacion con la tabla consultorios
            $table->unsignedBigInteger('consultorio_id')->nullable(); 
            $table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
