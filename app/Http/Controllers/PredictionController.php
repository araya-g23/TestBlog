<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    public function store(Request $request, $fixtureId)
    {
        $request->validate([
            'prediction' => 'required|in:home_win,away_win,draw',
        ]);

        Prediction::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'fixture_id' => $fixtureId,
            ],
            ['prediction' => $request->prediction]
        );

        return back()->with('success', 'Prediction submitted successfully!');
    }

    public function showPollResults($fixtureId)
    {
        $fixture = Fixture::findOrFail($fixtureId);
        $pollResults = Prediction::where('fixture_id', $fixtureId)
            ->selectRaw('prediction, COUNT(*) as count')
            ->groupBy('prediction')
            ->pluck('count', 'prediction');

        return view('fixtures.poll_results', compact('fixture', 'pollResults'));
    }
}
