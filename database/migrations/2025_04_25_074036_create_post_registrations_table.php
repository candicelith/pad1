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
        Schema::create('post_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('user_id');
            $table->string('cv');
            $table->string('status')->default('pending');
            $table->timestamps();

            // Add foreign keys with correct column references
            $table->foreign('vacancy_id')->references('id_vacancy')->on('vacancy')->onDelete('cascade');
            $table->foreign('user_id')->references('id_users')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_registrations');
    }
};
