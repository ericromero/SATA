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
        Schema::create('event_participations', function (Blueprint $table) {
            $table->char('id_participation', 36)->primary();
            $table->string('performed_role', 50);
            
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
        Schema::dropIfExists('event_participations');
    }
};
