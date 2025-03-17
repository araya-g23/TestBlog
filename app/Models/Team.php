<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stadium', 'logo', 'coach', 'founded'];

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
}
