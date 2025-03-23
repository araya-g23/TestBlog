<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamIdsToFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->unsignedBigInteger('home_team_id')->nullable()->after('home_team');
            $table->unsignedBigInteger('away_team_id')->nullable()->after('away_team');
        });
    }

    public function down()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropForeign(['home_team_id']);
            $table->dropForeign(['away_team_id']);
            $table->dropColumn(['home_team_id', 'away_team_id']);
        });
    }


}
