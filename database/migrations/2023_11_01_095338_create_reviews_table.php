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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->integer('user_id');
            $table->integer('game_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_id')->references('game_id')->on('games');
            $table->text('title');
            $table->text('platform');
            $table->string('content');
            $table->float('rating');
            $table->timestamps();

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
