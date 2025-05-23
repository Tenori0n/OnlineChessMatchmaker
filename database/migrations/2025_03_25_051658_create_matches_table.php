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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('white_ID');
            $table->foreign('white_ID')->references('id')->on('users');
            $table->bigInteger('black_ID');
            $table->foreign('black_ID')->references('id')->on('users');
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->boolean('winnerColor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
