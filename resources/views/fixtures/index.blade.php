@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Debugging: Show count of matches -->
        <p class="text-blue-500">Upcoming Matches Count: {{ $upcomingMatches->count() }}</p>
        <p class="text-blue-500">Past Matches Count: {{ $pastMatches->count() }}</p>

        <!-- Upcoming Matches -->
        <h2 class="text-3xl font-bold mb-6">⚽ Upcoming Matches</h2>

        @if($upcomingMatches->isEmpty())
            <p class="text-red-500">No upcoming matches found.</p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($upcomingMatches as $match)
                <div class="bg-white shadow-md rounded-lg p-4 text-center">
                    <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-12 h-12 object-contain">
                    <p class="font-bold">{{ $match->home_team }} VS {{ $match->away_team }}</p>
                    <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-12 h-12 object-contain">
                    <p>{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                    <p>{{ $match->venue }}</p>
                </div>
            @endforeach
        </div>

        <!-- Past Matches -->
        <h2 class="text-3xl font-bold mt-12 mb-6">📅 Past Matches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($pastMatches as $match)
                <div class="bg-gray-100 shadow-md rounded-lg p-4 text-center">
                    <div class="flex justify-center items-center mb-4">
                        <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-12 h-12 object-contain mr-2">
                        <span class="font-bold">{{ $match->home_team }}</span>
                        <span class="mx-2 text-red-500 font-bold">
                    @if($match->home_score !== null && $match->away_score !== null)
                                {{ $match->home_score }} - {{ $match->away_score }}
                            @else
                                VS
                            @endif
                </span>
                        <span class="font-bold">{{ $match->away_team }}</span>
                        <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-12 h-12 object-contain ml-2">
                    </div>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                    <p class="font-semibold">{{ $match->venue }}</p>
                    <p class="text-gray-700 mt-3">{{ $match->match_summary }}</p>

                    <!-- View Match Stats Button -->
                    <a href="{{ route('fixtures.show', $match->id) }}" class="text-blue-500 hover:underline font-bold mt-4 block">
                        View Match Stats
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
