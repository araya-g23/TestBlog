@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 flex items-center">
            ⚽ Upcoming Matches
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($upcomingMatches as $match)
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <div class="flex justify-between items-center">
                        <!-- Home Team -->
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/' . $match->home_logo) }}"
                                 alt="{{ $match->home_team }}"
                                 class="w-16 h-16 object-contain">

                            <span class="font-semibold">{{ $match->home_team }}</span>
                        </div>

                        <!-- VS -->
                        <div class="text-xl font-bold">VS</div>

                        <!-- Away Team -->
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/' . $match->away_logo) }}"
                                 alt="{{ $match->away_team }}"
                                 class="w-16 h-16 object-contain">

                            <span class="font-semibold">{{ $match->away_team }}</span>
                        </div>
                    </div>

                    <!-- Match Info -->
                    <p class="mt-4 text-gray-600 text-sm">
                        {{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}
                    </p>
                    <p class="font-bold mt-2">{{ $match->venue }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
