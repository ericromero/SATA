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
        Schema::create('modification_requests', function (Blueprint $table) {
            $table->char('id_request', 36)->primary();
            $table->string('request_type', 50);
            $table->text('reason');
            $table->string('approval_status', 50);
            $table->dateTime('request_date');
            
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
        Schema::dropIfExists('modification_requests');
    }
};
