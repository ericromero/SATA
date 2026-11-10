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
        Schema::create('student_accreditations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('academic_event_id')->constrained('academic_events')->onDelete('cascade');
            $table->string('status')->default('pendiente'); // pendiente, acreditado, no_acreditado
            $table->integer('hours_credited')->default(0); // Horas o créditos otorgados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accreditations');
    }
};
