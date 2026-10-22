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
        Schema::create('project_academics', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('degree_project_id')->constrained('degree_projects')->onDelete('cascade');
            $table->foreignId('academic_id')->constrained('academics')->onDelete('cascade');
            $table->foreignId('profile_project_id')->constrained('profiles_project');
            
            // Los campos que platicamos que nacen vacíos (nullable)
            $table->string('invitation_status', 50)->nullable();
            $table->string('vote_status', 50)->nullable();
            $table->timestamp('vote_date')->nullable();
            $table->text('observations')->nullable();
            
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_academics');
    }
};
