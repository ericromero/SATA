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
        Schema::create('format1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('degree_project_id')->unique()->constrained('degree_projects')->onDelete('cascade');
            $table->string('from_area', 100);
            $table->timestamp('signed_director_at')->nullable();
            $table->timestamp('signed_revisor_at')->nullable();
            $table->timestamp('signed_coord_at')->nullable();
            $table->timestamp('signed_division_at')->nullable();
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('format1');
    }
};
