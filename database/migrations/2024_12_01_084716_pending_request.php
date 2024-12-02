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
        Schema::create('pending_request', function(Blueprint $table) {
            $table->bigIncrements('id_request');
            $table->unsignedBigInteger('id_userDetails')->nullable();
            $table->unsignedBigInteger('id_tracking')->constrained()->nullable(); // Reference to the original job tracking record
            $table->unsignedBigInteger('id_company');
            $table->string('job_name');
            $table->text('job_description');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('request_type',['create','update']);
            $table->timestamps();

            $table->foreign('id_userDetails')->references('id_userDetails')->on('user_details');
            $table->foreign('id_tracking')->references('id_tracking')->on('job_tracking');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_request');
    }
};
