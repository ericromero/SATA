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
        Schema::create('mandatory_subjects', function (Blueprint $table) {
            $table->foreignId('subject_id')->references('subject_id')->on('subjects');
            $table->foreignId('academic_id')->references('academic_id')->on('academics');
            $table->boolean('is_mandatory');
            $table->primary(['subject_id', 'academic_id']); // PK Compuesta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandatory_subjects');
    }
};
