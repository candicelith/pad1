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
        Schema::create('job_company',function(Blueprint $table){
            $table->bigIncrements('id_job_company');
            $table->unsignedBigInteger('id_jobs');
            $table->unsignedBigInteger('id_company');
            $table->timestamps();

            $table->foreign('id_jobs')->references('id_jobs')->on('jobs');
            $table->foreign('id_company')->references('id_company')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_company');
    }
};
