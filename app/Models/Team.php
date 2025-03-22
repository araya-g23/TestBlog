<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use App\Models\Trophy;


class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'stadium', 'coach', 'founded', 'logo',
    ];
    // Define relationship with players (assuming a Player model exists)
//    public function players()
//    {
//        return $this->hasMany(Player::class);
//    }
//
//    // Define relationship with matches (assuming a Match model exists)
//    public function matches()
//    {
//        return $this->hasMany(Match::class);
//    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function trophies()
    {
        return $this->hasMany(Trophy::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }



}
