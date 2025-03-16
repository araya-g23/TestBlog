<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('pages.teams', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('pages.team', compact('team'));
    }
}
