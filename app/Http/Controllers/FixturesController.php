<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Models\PlayerMatchVote;
use App\Models\Player;

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
        $fixture = Fixture::with(['players', 'votes'])->findOrFail($id);
        $matchStats = json_decode($fixture->match_statistics, true);

        return view('fixtures.show', compact('fixture', 'matchStats'));
    }


    public function vote(Request $request, $matchId)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
        ]);

        $alreadyVoted = PlayerMatchVote::where('user_id', auth()->id())
            ->where('match_id', $matchId)
            ->exists();

        if ($alreadyVoted) {
            return back()->with('error', 'You have already voted for this match.');
        }

        PlayerMatchVote::create([
            'user_id' => auth()->id(),
            'match_id' => $matchId,
            'player_id' => $request->player_id,
        ]);

        return back()->with('success', 'Thank you for voting!');
    }



}
