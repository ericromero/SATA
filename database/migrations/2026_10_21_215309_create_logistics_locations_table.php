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
            $table->char('id_logistics', 36)->primary();
            $table->string('building', 100)->nullable();
            $table->string('room_or_space', 100)->nullable();
            $table->string('digital_platform', 50)->nullable();
            
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
        Schema::dropIfExists('logistics_locations');
    }
};
