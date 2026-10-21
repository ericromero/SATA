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
        Schema::create('academic_events', function (Blueprint $table) {
            $table->char('id_event', 36)->primary();
            $table->string('name', 150);
            $table->string('event_type', 50);
            $table->string('modality', 50);
            $table->string('status', 50);
            $table->integer('max_capacity');
            $table->integer('occupied_capacity')->default(0);
            $table->boolean('attendance_blocked')->default(false);
            $table->dateTime('grade_submission_deadline')->nullable();
            
            // Llave foránea hacia la tabla users (id_user)
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_events');
    }
};
