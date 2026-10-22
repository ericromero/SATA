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
        Schema::create('ordinary_periods', function (Blueprint $table) {
            $table->id('ordinary_p_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active');
            $table->boolean('is_extemporaneous');
            // Como acordamos, apuntando directo a users para mayor trazabilidad
            $table->foreignId('manager_id')->constrained('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinary_periods');
    }
};
