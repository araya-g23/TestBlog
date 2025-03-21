<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = ['home_team', 'away_team', 'home_team_logo', 'away_team_logo', 'match_date', 'venue'];
}
