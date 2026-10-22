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
        Schema::create('extraordinary_proposals', function (Blueprint $table) {
            $table->id('extra_prop_id');
            $table->date('exam_date');
            $table->string('schedule', 30);
            $table->foreignId('classroom_id')->references('classroom_id')->on('classrooms');
            $table->integer('quota');
            $table->foreignId('extraordinary_periods_id')->references('extraordinary_p_id')->on('extraordinary_periods');
            $table->foreignId('subject_id')->references('subject_id')->on('subjects');
            $table->foreignId('academic_id')->references('academic_id')->on('academics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extraordinary_proposals');
    }
};
