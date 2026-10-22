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
        Schema::create('academics', function (Blueprint $table) {
            $table->id('academic_id');
            $table->foreignId('user_id')->constrained('users'); 
            $table->integer('employee_number'); // int(10)
            $table->string('area', 30);
            $table->integer('min_required_hours');
            $table->foreignId('contract_id')->references('contract_id')->on('contracts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
