<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_team', 'away_team', 'home_team_logo', 'away_team_logo',
        'match_date', 'venue', 'home_team_id', 'away_team_id'
    ];


    public function votes() {
        return $this->hasMany(PlayerMatchVote::class, 'match_id');
    }
    public function players()
    {
        return $this->belongsToMany(Player::class); // pivot table required
    }
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }



}
