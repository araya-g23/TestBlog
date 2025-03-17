<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\FootballMatch;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $matches = FootballMatch::orderBy('date', 'asc')->take(5)->get();
        $teams = Team::take(4)->get();

        return view('pages.home', compact('posts', 'matches', 'teams'));
    }
}
