<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    protected $fillable = ['team_id', 'title', 'year'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
