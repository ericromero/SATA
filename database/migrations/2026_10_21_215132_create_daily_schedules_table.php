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
        Schema::create('daily_schedules', function (Blueprint $table) {
            $table->char('id_schedule', 36)->primary();
            $table->date('session_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('session_type', 50);
            
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
        Schema::dropIfExists('daily_schedules');
    }
};
