<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerMatchVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'match_id',
        'player_id',
    ];

}
