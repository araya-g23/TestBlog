<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->string('home_team');
            $table->string('away_team');
            $table->string('home_team_logo');
            $table->string('away_team_logo');
            $table->dateTime('match_date');
            $table->string('venue');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
};
