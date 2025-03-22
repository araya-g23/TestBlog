<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Fixture; // ✅ Import the Fixture model
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $teams = Team::take(4)->get();

        // Only get followed teams if logged in
        $yourTeams = auth()->check() ? auth()->user()->followedTeams : collect();

        // Always show upcoming matches (not just limited to user's teams)
        $upcomingMatches = Fixture::where('match_date', '>', now())
            ->orderBy('match_date', 'asc')
            ->take(3)
            ->get();

        return view('pages.home', compact('posts', 'teams', 'yourTeams', 'upcomingMatches'));
    }




}
