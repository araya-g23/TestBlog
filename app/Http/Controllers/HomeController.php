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

        // Get 3 upcoming matches
        $upcomingMatches = Fixture::where('match_date', '>', now())
            ->orderBy('match_date', 'asc')
            ->take(3) // Limit to 3 matches
            ->get();

        $teams = Team::take(4)->get();

        return view('pages.home', compact('posts', 'upcomingMatches', 'teams'));
    }
}
