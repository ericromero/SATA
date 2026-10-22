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
        Schema::create('degree_projects', function (Blueprint $table) {
            $table->id(); // Este es tu degree_project_id (PK)
            
            // --- Llaves Foráneas hacia tus catálogos ---
            $table->foreignId('modality_id')->constrained('modalities')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
            
            // --- Atributos de Titulación ---
            $table->string('title_project', 255)->nullable(); 
            $table->string('current_status', 50);
            $table->boolean('is_active')->default(true);
            
            $table->timestamps(); // Genera created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree_projects');
    }
};
