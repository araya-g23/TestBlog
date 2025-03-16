<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Team;
use App\Models\FootballMatch;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Team::factory(10)->create();
        Post::factory(20)->create();
    }
}
