<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->text('match_summary')->nullable(); // Summary of key events
        });
    }

    public function down()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropColumn(['home_score', 'away_score', 'match_summary']);
        });
    }
};
