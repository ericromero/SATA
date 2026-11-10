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
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('employe_number', 10)->unique(); // varchar para proteger los ceros a la izquierda
            
           
            $table->unsignedBigInteger('appointment_type_id')->nullable(); 
            $table->unsignedBigInteger('grade_id')->nullable(); 
            
            // Atributos integrados del modelo general
            $table->integer('min_required_hours')->default(0);
            $table->unsignedBigInteger('contract_id')->nullable(); 
            $table->integer('reprogramaciones_semestre')->default(0);
            $table->integer('cancelaciones_semestre')->default(0);
            $table->string('RFC', 13)->unique();
            $table->timestamps();

            // Definición de las restricciones de llaves foráneas
            $table->foreign('user_id')->references('User_id')->on('user')->onDelete('cascade');
            $table->foreign('appointment_type_id')->references('id')->on('appointment_types')->onDelete('set null');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
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