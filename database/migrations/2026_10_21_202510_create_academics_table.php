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
            $table->foreignId('id_user')->primary()->constrained('users', 'id_user')->onDelete('cascade');
            $table->string('worker_number', 30)->unique();
            $table->integer('semester_cancellations')->default(0);
            $table->integer('semester_reschedules')->default(0);
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
