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
        Schema::create('extraordinary_periods', function (Blueprint $table) {
            $table->id('extraordinary_p_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active');
            $table->foreignId('register_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->integer('period');
            $table->date('start_application_date');
            $table->date('end_application_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extraordinary_periods');
    }
};
