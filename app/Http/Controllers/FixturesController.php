<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fixture;

class FixturesController extends Controller
{
    public function index()
    {
        // Get upcoming matches (matches without scores)
        $upcomingMatches = Fixture::whereNull('home_score')->orderBy('match_date', 'asc')->get();

        return view('fixtures.index', compact('upcomingMatches'));
    }
}

