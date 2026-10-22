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
            Schema::create('project_students', function (Blueprint $table) {
                $table->id(); 
                
                $table->foreignId('degree_project_id')->constrained('degree_projects')->onDelete('cascade');
                
                // OJO AQUÍ: Especificamos que student_id se conecta a 'students_in_process'
                $table->foreignId('student_id')->constrained('students_in_process')->onDelete('cascade');
                
                $table->boolean('is_creator')->default(false);
                
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_students');
    }
};
