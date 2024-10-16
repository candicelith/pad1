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
        Schema::create('jobs',function(Blueprint $table){
            $table->bigIncrements('id_jobs');
            $table->unsignedBigInteger('id_company');
            $table->string('job_name');
            $table->string('job_description');
            $table->string('job_role');
            $table->timestamps();

            $table->foreign('id_company')->references('id_company')->on('company');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
