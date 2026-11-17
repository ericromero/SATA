<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_deliveries', function (Blueprint $table) {
            $table->id('Id_notification');
            $table->string('delivery_method', 20);
            $table->dateTime('scheduledd_for')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->boolean('Status')->default(false);
            $table->foreignId('User_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_deliveries');
    }
};