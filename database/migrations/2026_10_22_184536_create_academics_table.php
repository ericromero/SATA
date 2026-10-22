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
        Schema::create('academics', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // --- Atributos del Esquema General ---
            $table->integer('employe_number')->unique();
            $table->integer('min_required_hours')->default(0);
            // $table->foreignId('contract_id')->nullable()->constrained('contracts'); // Descomentar si la tabla contracts ya existe
            $table->integer('contract_id')->nullable(); 
            $table->integer('reprogramaciones_semestre')->default(0);
            $table->integer('cancelaciones_semestre')->default(0);
            
            // --- Atributos para Titulación ---
            $table->string('department', 100)->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
