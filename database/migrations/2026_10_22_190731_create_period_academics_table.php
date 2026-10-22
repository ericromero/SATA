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
        Schema::create('period_academics', function (Blueprint $table) {
            $table->foreignId('ordinary_period_id')->references('ordinary_p_id')->on('ordinary_periods');
            $table->foreignId('academic_id')->references('academic_id')->on('academics');
            $table->boolean('is_enabled');
            $table->primary(['ordinary_period_id', 'academic_id']); // PK Compuesta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('period_academics');
    }
};
