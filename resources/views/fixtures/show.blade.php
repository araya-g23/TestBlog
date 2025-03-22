@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">⚽ Match Statistics</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold mb-4">
                {{ $fixture->home_team }} {{ $fixture->home_score }} - {{ $fixture->away_score }} {{ $fixture->away_team }}
            </h3>

            <p><strong>Match Date:</strong> {{ \Carbon\Carbon::parse($fixture->match_date)->format('D, d M Y - h:i A') }}</p>
            <p><strong>Venue:</strong> {{ $fixture->venue }}</p>

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

            @auth
                <h4 class="text-xl font-bold mt-6">🏅 Vote for Player of the Match</h4>
                <form action="{{ route('player.vote', $fixture->id) }}" method="POST" class="mt-2">
                    @csrf
                    <select name="player_id" class="border p-2 rounded w-full">
                        <optgroup label="{{ $fixture->home_team }}">
                            @foreach($fixture->players->filter(fn($p) => $p->team->name === $fixture->home_team) as $player)
                                <option value="{{ $player->id }}">{{ $player->name }} ({{ $player->position }})</option>
                            @endforeach
                        </optgroup>

                        <optgroup label="{{ $fixture->away_team }}">
                            @foreach($fixture->players->filter(fn($p) => $p->team->name === $fixture->away_team) as $player)
                                <option value="{{ $player->id }}">{{ $player->name }} ({{ $player->position }})</option>
                            @endforeach
                        </optgroup>


                    </select>
                    <button type="submit" class="mt-2 bg-green-600 text-white px-4 py-2 rounded">Vote</button>
                </form>

            @else
                <p class="text-red-500 mt-4">Please login to vote for the player of the match.</p>
            @endauth

            <h4 class="text-xl font-bold mt-6">📊 Voting Results</h4>
            <ul class="list-disc pl-6">
                @foreach($fixture->votes->groupBy('player_id') as $playerId => $votes)
                    <li>
                        {{ \App\Models\Player::find($playerId)->name }} - {{ count($votes) }} vote(s)
                    </li>
                @endforeach
            </ul>



            <a href="{{ route('fixtures.index') }}" class="bg-blue-500 text-white p-2 rounded mt-4 inline-block">
                ← Back to Fixtures
            </a>


        </div>
    </div>
@endsection
