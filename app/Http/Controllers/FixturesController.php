<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;

class FixturesController extends Controller
{
    public function index()
    {
        $upcomingMatches = Fixture::where('match_date', '>', now())->orderBy('match_date', 'asc')->get();
        $pastMatches = Fixture::where('match_date', '<', now())->orderBy('match_date', 'desc')->get();

        // Debugging: Output the matches
        //dd($upcomingMatches, $pastMatches);

        return view('fixtures.index', compact('upcomingMatches', 'pastMatches'));
    }



    public function show($id)
    {
        $fixture = Fixture::findOrFail($id);
        $matchStats = json_decode($fixture->match_statistics, true); // Convert JSON stats to an array

        return view('fixtures.show', compact('fixture', 'matchStats'));
    }




}
