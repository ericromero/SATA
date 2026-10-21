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
        
        // Atributos integrados del modelo general
        $table->integer('min_required_hours')->default(0);
        $table->unsignedBigInteger('contract_id')->nullable(); 
        $table->integer('reprogramaciones_semestre')->default(0);
        $table->integer('cancelaciones_semestre')->default(0);
        $table->timestamps();

        $table->foreign('user_id')->references('User_id')->on('user')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('academics');
}
};
