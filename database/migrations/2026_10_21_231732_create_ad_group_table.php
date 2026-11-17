<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ad_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_ads')->constrained('ads', 'Id_ads')->onDelete('cascade');
            $table->foreignId('Id_group')->constrained('groups', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_group');
    }
};