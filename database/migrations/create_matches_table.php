<?php
Schema::create('matches', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('home_team_id');
    $table->unsignedBigInteger('away_team_id');
    $table->date('date');
    $table->string('result')->nullable();
    $table->timestamps();
});
