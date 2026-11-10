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
        Schema::create('logistics_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del aula, auditorio o enlace Zoom/Meet
            $table->string('building')->nullable(); // Edificio o anexo
            $table->integer('capacity')->nullable(); // Capacidad de aforo
            $table->string('location_type')->default('Presencial'); // Presencial o Virtual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics_locations');
    }
};
