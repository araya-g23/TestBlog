<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->json('match_statistics')->nullable()->after('match_summary'); // Store stats as JSON
        });
    }

    public function down()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropColumn('match_statistics');
        });
    }
};
