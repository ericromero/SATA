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
        Schema::create('ordinary_proposals', function (Blueprint $table) {
            $table->id('subject_prop_id');
            $table->boolean('is_published')->default(false);
            $table->string('status', 20);
            $table->string('group', 5);
            $table->integer('quota');
            $table->string('day', 50);
            $table->time('schedule');
            $table->foreignId('classroom_id')->references('classroom_id')->on('classrooms');
            $table->string('observations', 400)->nullable();
            $table->string('practice_scenario', 100)->nullable();
            
            // Llaves foráneas
            $table->foreignId('academic_id')->references('academic_id')->on('academics');
            $table->foreignId('ordinary_periods_id')->references('ordinary_p_id')->on('ordinary_periods');
            $table->foreignId('subject_id')->references('subject_id')->on('subjects');
            
            // Flujo de aprobación
            $table->foreignId('manager_id')->constrained('users');
            $table->foreignId('coordinator_id')->nullable()->constrained('users');
            $table->string('modificacion_notes', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinary_proposals');
    }
};
