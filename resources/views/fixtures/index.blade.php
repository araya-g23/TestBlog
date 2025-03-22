@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">

        {{-- Upcoming Matches --}}
        <h2 class="text-3xl font-bold mb-6 flex items-center">
            <span class="mr-2">⚽</span> Upcoming Matches
        </h2>

        <div class="relative">
            <button id="prevUpcoming" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white px-3 py-2 rounded-full z-10">&lt;</button>

            <div id="upcomingWrapper" class="overflow-hidden">
                <div id="upcomingSlides" class="flex transition-transform duration-300 ease-in-out">
                    @foreach($upcomingMatches->chunk(4) as $chunk)
                        <div class="grid grid-cols-2 gap-4 min-w-full px-4">
                            @foreach($chunk as $match)
                                <div class="bg-white shadow-md rounded-lg p-4 text-center">
                                    <div class="flex justify-center items-center mb-4">
                                        <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-10 h-10 object-contain mr-2">
                                        <span class="font-bold">{{ $match->home_team }}</span>
                                        <span class="mx-2">VS</span>
                                        <span class="font-bold">{{ $match->away_team }}</span>
                                        <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-10 h-10 object-contain ml-2">
                                    </div>
                                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                                    <p class="font-semibold">{{ $match->venue }}</p>

                                    @auth
                                        <form action="{{ route('fixtures.predict', $match->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            <label><input type="radio" name="prediction" value="home_win"> {{ $match->home_team }} Win</label><br>
                                            <label><input type="radio" name="prediction" value="away_win"> {{ $match->away_team }} Win</label><br>
                                            <label><input type="radio" name="prediction" value="draw"> Draw</label><br>
                                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Submit Prediction</button>
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
                    @endforeach
                </div>
            </div>

            <button id="nextUpcoming" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white px-3 py-2 rounded-full z-10">&gt;</button>
        </div>

        {{-- Past Matches --}}
        <h2 class="text-3xl font-bold mt-12 mb-6 flex items-center">
            <span class="mr-2">📅</span> Past Matches
        </h2>

        <div class="relative">
            <button id="prevPast" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white px-3 py-2 rounded-full z-10">&lt;</button>

            <div id="pastWrapper" class="overflow-hidden">
                <div id="pastSlides" class="flex transition-transform duration-300 ease-in-out">
                    @foreach($pastMatches->chunk(4) as $chunk)
                        <div class="grid grid-cols-2 gap-4 min-w-full px-4">
                            @foreach($chunk as $match)
                                <div class="bg-gray-100 shadow-md rounded-lg p-4 text-center">
                                    <div class="flex justify-center items-center mb-4">
                                        <img src="{{ asset('storage/' . $match->home_team_logo) }}" class="w-10 h-10 object-contain mr-2">
                                        <span class="font-bold">{{ $match->home_team }}</span>
                                        <span class="mx-2 text-red-500 font-bold">{{ $match->home_score }} - {{ $match->away_score }}</span>
                                        <span class="font-bold">{{ $match->away_team }}</span>
                                        <img src="{{ asset('storage/' . $match->away_team_logo) }}" class="w-10 h-10 object-contain ml-2">
                                    </div>
                                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                                    <p class="font-semibold">{{ $match->venue }}</p>
                                    <p class="text-gray-700 mt-2">{{ $match->match_summary }}</p>

                                    <a href="{{ route('fixtures.show', $match->id) }}" class="text-blue-500 hover:underline mt-2 block font-bold">
                                        View Match Stats
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <button id="nextPast" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-700 text-white px-3 py-2 rounded-full z-10">&gt;</button>
        </div>
    </div>

    <script>
        function initGridSlider(slidesId, prevBtnId, nextBtnId) {
            const slider = document.getElementById(slidesId);
            const slides = slider.children.length;
            let index = 0;

            document.getElementById(prevBtnId).addEventListener('click', () => {
                index = Math.max(0, index - 1);
                slider.style.transform = `translateX(-${index * 100}%)`;
            });

            document.getElementById(nextBtnId).addEventListener('click', () => {
                index = Math.min(slides - 1, index + 1);
                slider.style.transform = `translateX(-${index * 100}%)`;
            });
        }

        initGridSlider('upcomingSlides', 'prevUpcoming', 'nextUpcoming');
        initGridSlider('pastSlides', 'prevPast', 'nextPast');
    </script>
@endsection
