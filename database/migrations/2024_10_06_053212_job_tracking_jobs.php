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
        Schema::create('job_tracking_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_tracking_id');
            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            $table->foreign('job_tracking_id')->references('id_tracking')->on('job_tracking')->onDelete('cascade');
            $table->foreign('job_id')->references('id_jobs')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tracking_jobs');
    }
};

