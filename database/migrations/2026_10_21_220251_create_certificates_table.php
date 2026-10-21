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
        Schema::create('certificates', function (Blueprint $table) {
            $table->char('id_certificate', 36)->primary();
            $table->string('unique_validation_code', 100)->unique();
            $table->string('emission_semester', 20);
            $table->string('pdf_url', 255);
            $table->string('certificate_type', 50);
            
            // Llave foránea hacia users
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            
            // Llave foránea hacia academic_events
            $table->char('id_event', 36);
            $table->foreign('id_event')->references('id_event')->on('academic_events')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
