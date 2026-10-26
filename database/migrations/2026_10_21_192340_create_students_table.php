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
    Schema::create('students', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->primary();
        $table->string('account_number', 10)->unique();
        
        // Atributos integrados del modelo general
        $table->boolean('sancion_activa')->default(false);
        $table->integer('evaluaciones_pendientes')->default(0);
        $table->boolean('has_require_credits')->default(false);
        $table->boolean('has_social_service')->default(false);
        $table->boolean('has_language_clearance')->default(false);
        $table->boolean('is_active')->default(true);
        $table->timestamps();

        $table->foreign('user_id')->references('User_id')->on('user')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('students');
}
};
