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
        Schema::create('users',function(Blueprint $table){
            $table->bigIncrements('id_users');
            $table->unsignedBigInteger('id_roles');
            $table->string('email');
            $table->string('password');
            $table->string('password_hashed');
            $table->timestamps();

            $table->foreign('id_roles')->references('id_roles')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
