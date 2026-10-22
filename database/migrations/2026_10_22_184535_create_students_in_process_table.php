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
            Schema::create('students_in_process', function (Blueprint $table) {
                $table->id(); 
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                
                // --- Atributos del Esquema General ---
                $table->string('account_number', 10)->unique();
                $table->boolean('sancion_activa')->default(false);
                $table->integer('evaluaciones_pendientes')->default(0);
                
                // --- Atributos para Titulación ---
                $table->string('name')->nullable();
                $table->boolean('has_required_credits')->default(false);
                $table->boolean('has_social_service')->default(false);
                $table->boolean('has_language_clearance')->default(false);
                $table->boolean('is_active')->default(false);
                
                $table->timestamps(); 
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_in_process');
    }
};
