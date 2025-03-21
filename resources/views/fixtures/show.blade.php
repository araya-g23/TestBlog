@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">⚽ Match Statistics</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold mb-4">{{ $fixture->home_team }} vs {{ $fixture->away_team }}</h3>

            <p><strong>Match Date:</strong> {{ \Carbon\Carbon::parse($fixture->match_date)->format('D, d M Y - h:i A') }}</p>
            <p><strong>Venue:</strong> {{ $fixture->venue }}</p>

            <h4 class="text-xl font-bold mt-4">Stats</h4>
            @if(!empty($matchStats))
                <h4 class="text-xl font-bold mt-4">Stats</h4>
                <ul class="list-disc pl-6">
                    <li>Ball Possession: {{ $matchStats['possession'] ?? 'N/A' }}</li>
                    <li>Shots on Target: {{ $matchStats['shots_on_target'] ?? 'N/A' }}</li>
                    <li>Fouls: {{ $matchStats['fouls'] ?? 'N/A' }}</li>
                    <li>Corners: {{ $matchStats['corners'] ?? 'N/A' }}</li>
                    <li>Top Scorer: {{ $matchStats['top_scorer'] ?? 'N/A' }}</li>
                    <li>Yellow Cards: {{ $matchStats['yellow_cards'] ?? 'N/A' }}</li>
                    <li>Red Cards: {{ $matchStats['red_cards'] ?? 'N/A' }}</li>
                </ul>
            @else
                <p>No statistics available for this match.</p>
            @endif

        </div>
    </div>
@endsection
