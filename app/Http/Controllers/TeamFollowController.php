<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamFollowController extends Controller
{
    public function follow(Team $team)
    {
        auth()->user()->followedTeams()->attach($team->id);
        return back()->with('success', 'Team followed!');
    }

    public function unfollow(Team $team)
    {
        auth()->user()->followedTeams()->detach($team->id);
        return back()->with('success', 'Team unfollowed!');
    }
}
