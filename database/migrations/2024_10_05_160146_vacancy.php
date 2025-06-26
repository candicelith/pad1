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
        Schema::create('vacancy', function (Blueprint $table) {
            $table->bigIncrements('id_vacancy');
            $table->unsignedBigInteger('id_company');
            $table->unsignedBigInteger('id_users');
            $table->string('position');
            $table->text('vacancy_description');

            $table->json('vacancy_responsibilities');
            $table->json('vacancy_qualification');
            $table->json('vacancy_benefits');

            $table->date('date_open')->nullable();
            $table->date('date_closed')->nullable();
            $table->json('vacancy_picture')->nullable();
            $table->string('vacancy_link')->nullable();
            $table->timestamps();

            $table->foreign('id_company')->references('id_company')->on('company');
            $table->foreign('id_users')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy');
    }
};
