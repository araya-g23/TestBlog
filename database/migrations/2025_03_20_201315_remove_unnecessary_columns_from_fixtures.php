<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropColumn([
                'ball_possession_home',
                'ball_possession_away',
                'shots_on_target_home',
                'shots_on_target_away',
                'fouls_home',
                'fouls_away',
                'corners_home',
                'corners_away',
                'player_stats'
            ]);
        });
    }

    public function down()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->integer('ball_possession_home')->nullable();
            $table->integer('ball_possession_away')->nullable();
            $table->integer('shots_on_target_home')->nullable();
            $table->integer('shots_on_target_away')->nullable();
            $table->integer('fouls_home')->nullable();
            $table->integer('fouls_away')->nullable();
            $table->integer('corners_home')->nullable();
            $table->integer('corners_away')->nullable();
            $table->json('player_stats')->nullable();
        });
    }
};
