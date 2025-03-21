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
            $table->string('home_team_logo')->nullable(); // ✅ Make nullable to prevent errors
            $table->string('away_team_logo')->nullable(); // ✅ Make nullable to prevent errors
            $table->dateTime('match_date');
            $table->string('venue');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->text('match_summary')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
};
