<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message_policies', function (Blueprint $table) {
            $table->id('Id_message_policy');
            $table->dateTime('edit_window_minutes')->nullable();
            $table->dateTime('delete_window_minutes')->nullable();
            $table->boolean('Status')->default(true);
            $table->foreignId('Id_message')->constrained('messages', 'Id_message')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('message_policies');
    }
};