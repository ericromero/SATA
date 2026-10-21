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
            $table->char('id_accreditation', 36)->primary();
            $table->boolean('attended')->default(false);
            $table->integer('grade')->nullable();
            
            // Llave foránea hacia academic_events
            $table->char('id_event', 36);
            $table->foreign('id_event')->references('id_event')->on('academic_events')->onDelete('cascade');
            
            // Llave foránea hacia users
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
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
