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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('gamesPlayed')->nullable()->default(0)->change();
            $table->bigInteger('gamesWon')->nullable()->default(0)->change();
            $table->bigInteger('elo')->nullable()->default(1000)->change();
            $table->boolean('rules')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('gamesPlayed')->nullable()->default(0)->change();
            $table->bigInteger('gamesWon')->nullable()->default(0)->change();
            $table->bigInteger('elo')->nullable()->default(1000)->change();
            $table->boolean('rules')->default(false);
        });
    }
};
