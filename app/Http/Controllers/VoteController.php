<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function store(Request $request, $matchId)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
        ]);

        PlayerMatchVote::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'match_id' => $matchId,
            ],
            [
                'player_id' => $request->player_id,
            ]
        );

        return back()->with('success', 'Your vote has been recorded!');
    }

}
