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
        Schema::create('user_details', function(Blueprint $table){
            $table->bigIncrements('id_userDetails');
            $table->unsignedBigInteger('id_users');
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('profile_photo')->nullable();
            $table->year('graduate_year');
            $table->boolean('isAlumni');
            $table->string('modifiedBy');
            $table->timestamp('modifiedDate')->useCurrent();
            $table->timestamps();

            $table->foreign('id_users')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
