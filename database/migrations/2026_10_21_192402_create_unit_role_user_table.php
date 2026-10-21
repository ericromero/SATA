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
    Schema::create('unit_role_user', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedBigInteger('user_id');
        $table->unsignedInteger('role_id');
        $table->unsignedInteger('unit_id');
        $table->timestamps();

        $table->foreign('user_id')->references('User_id')->on('user')->onDelete('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('unit_role_user');
}
};
