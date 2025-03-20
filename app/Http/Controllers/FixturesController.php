<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ Add this line

class FixturesController extends Controller
{
    public function index()
    {
        $upcomingMatches = Fixture::where('match_date', '>', now())->orderBy('match_date', 'asc')->get();
        $pastMatches = Fixture::where('match_date', '<', now())->orderBy('match_date', 'desc')->get();

        return view('fixtures.index', compact('upcomingMatches', 'pastMatches'));
    }
}
