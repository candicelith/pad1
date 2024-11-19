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
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id_comment');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_vacancy')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('parent_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('text_comment');
            $table->timestamps();

            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_vacancy')->references('id_vacancy')->on('vacancy')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
