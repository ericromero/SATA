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
        Schema::create('academic_ordinary_proposal', function (Blueprint $table) {
            $table->id();
            // Conexión a la propuesta
            $table->foreignId('ordinary_proposal_id')->references('subject_prop_id')->on('ordinary_proposals');
            // Conexión al profesor
            $table->foreignId('academic_id')->references('academic_id')->on('academics');
            // El requerimiento de las horas:
            $table->integer('assigned_hours'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_ordinary_proposal');
    }
};
