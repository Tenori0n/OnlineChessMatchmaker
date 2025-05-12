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
        Schema::create('turns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_ID');
            $table->foreign('match_ID')->references('id')->on('matches');
            $table->bigInteger('turnNumber');
            $table->string('figure');
            $table->string('fieldFrom');
            $table->string('fieldTo');
            $table->boolean('check');
            $table->boolean('mate');
            $table->boolean('draw');
            $table->boolean('capture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turns');
    }
};
