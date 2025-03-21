@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">⚽ Upcoming Matches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($upcomingMatches as $match)
                <div class="bg-white shadow-md rounded-lg p-4 text-center">
                    <div class="flex justify-center items-center mb-4">
                        <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-12 h-12 object-contain mr-2">
                        <span class="font-bold">{{ $match->home_team }}</span>
                        <span class="mx-2">VS</span>
                        <span class="font-bold">{{ $match->away_team }}</span>
                        <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-12 h-12 object-contain mr-2">
                    </div>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                    <p class="font-semibold">{{ $match->venue }}</p>

                    @auth
                        <form action="{{ route('fixtures.predict', $match->id) }}" method="POST" class="mt-2">
                            @csrf
                            <label>
                                <input type="radio" name="prediction" value="home_win"> {{ $match->home_team }} Win
                            </label>
                            <label>
                                <input type="radio" name="prediction" value="away_win"> {{ $match->away_team }} Win
                            </label>
                            <label>
                                <input type="radio" name="prediction" value="draw"> Draw
                            </label>
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-2">Submit Prediction</button>
                        </form>
                    @else
                        <p class="text-red-500">Login to make a prediction.</p>
                    @endauth

                    <a href="{{ route('fixtures.poll-results', $match->id) }}" class="text-blue-500 hover:underline mt-2 block">
                        View Poll Results
                    </a>
                </div>
            @endforeach
        </div>

        <h2 class="text-3xl font-bold mt-12 mb-6">📅 Past Matches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($pastMatches as $match)
                <div class="bg-gray-100 shadow-md rounded-lg p-4 text-center">
                    <div class="flex justify-center items-center mb-4">
                        <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-12 h-12 object-contain mr-2">
                        <span class="font-bold">{{ $match->home_team }}</span>
                        <span class="mx-2 text-red-500 font-bold">{{ $match->home_score }} - {{ $match->away_score }}</span>
                        <span class="font-bold">{{ $match->away_team }}</span>
                        <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-12 h-12 object-contain mr-2">
                    </div>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                    <p class="font-semibold">{{ $match->venue }}</p>
                    <p class="text-gray-700 mt-3">{{ $match->match_summary }}</p>

                    <a href="{{ route('fixtures.show', $match->id) }}" class="text-blue-500 hover:underline font-bold mt-4 block">
                        View Match Stats
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
