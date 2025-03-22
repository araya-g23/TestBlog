<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'position', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function votes() {
        return $this->hasMany(PlayerMatchVote::class);
    }
    public function fixtures()
    {
        return $this->belongsToMany(Fixture::class);
    }


}
