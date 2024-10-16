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
        Schema::create('job_tracking',function(Blueprint $table){
            $table->bigIncrements('id_tracking');
            $table->unsignedBigInteger('id_userDetails');
            $table->unsignedBigInteger('id_jobs');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->enum('status',array('Active','Inactive'));
            $table->enum('type',array('Internship', 'Fulltime', 'Part Time'));
            $table->timestamps();

            $table->foreign('id_userDetails')->references('id_userDetails')->on('user_details');
            $table->foreign('id_jobs')->references('id_jobs')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tracking');
    }
};
