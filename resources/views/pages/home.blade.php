@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">🏆 Welcome to the Football Blog 🏆</h1>
        <p class="text-center text-gray-600 mb-8">Stay updated with the latest football news, upcoming fixtures, and team rankings!</p>

        <section class="mb-10">
            <h2 class="text-2xl font-bold flex items-center mb-4">⚽ Your Teams</h2>

            @if($yourTeams->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($yourTeams as $team)
                        <a href="{{ route('teams.show', $team->id) }}" class="flex flex-col items-center bg-white shadow-md p-4 rounded-lg hover:shadow-lg transition">
                            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" class="w-10 h-10 object-contain">

                            <p class="text-gray-800 font-semibold">{{ $team->name }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">You haven’t followed any teams yet.</p>
            @endif
        </section>

        <!-- 🔥 Featured News Section -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">🔥 Latest News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($posts->take(3) as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <a href="{{ route('blog.show', $post->id) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">
                                <a href="{{ route('blog.show', $post->id) }}" class="hover:text-blue-500">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600">{{ Str::limit($post->content, 100, '...') }}</p>
                            <a href="{{ route('blog.show', $post->id) }}" class="text-blue-500 mt-2 inline-block">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ⚽ Upcoming Matches -->
        <section class="mb-10">
            @if($upcomingMatches->count() > 0)
                <h2 class="text-2xl font-bold flex items-center">⚽ Upcoming Matches</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($upcomingMatches as $match)
                        <div class="bg-white shadow-md rounded-lg p-4 text-center">
                            <h3 class="font-bold">{{ $match->home_team }} VS {{ $match->away_team }}</h3>
                            <p class="text-gray-600">{{ \Carbon\Carbon::parse($match->match_date)->format('D, d M Y - h:i A') }}</p>
                            <p class="font-semibold">{{ $match->venue }}</p>
                            <a href="{{ route('fixtures.show', $match->id) }}" class="text-blue-500 hover:underline mt-2 block">
                                View Match Details
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No upcoming matches available.</p>
            @endif
        </section>


        <!-- 🏆 Top Teams -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">🏆 Top Teams</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($teams as $team)
                    <div class="flex flex-col items-center bg-white shadow-md p-4 rounded-lg">
                        <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" class="w-10 h-10 object-contain">

                        <p class="text-gray-800 font-semibold mt-2">{{ $team->name }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 📸 Latest Images -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4 flex items-center">
                <span class="mr-2">📸</span> Latest Images
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach([
                    ['src' => 'images/pic1.jpg', 'caption' => 'Messi silences the Santiago Bernabéu by holding up his shirt after a last-minute winner in El Clásico.'],
                    ['src' => 'images/pic2.jpg', 'caption' => 'Iniesta’s extra-time strike gives Spain their first ever FIFA World Cup.'],
                    ['src' => 'images/pic3.jpg', 'caption' => 'Maradona dribbles past five England players in the 1986 World Cup – a moment etched in football history.'],
                    ['src' => 'images/pic4.jpeg', 'caption' => 'Casillas stretches a foot to deny Robben a sure goal – a match-defining moment.'],
                    ['src' => 'images/pic5.jpg', 'caption' => 'A perfect left-footed volley into the top corner – Zizou’s magic on the biggest stage.'],
                    ['src' => 'images/pic6.jpg', 'caption' => 'A jaw-dropping overhead kick by Ronaldo in the Champions League quarter-final – applauded even by Juve fans.'],
                    ['src' => 'images/pic 7.jpg', 'caption' => 'Lionel Messi finally lifts the FIFA World Cup trophy, completing his football legacy with Argentina.'],
                    ['src' => 'images/pic8.jpg', 'caption' => 'United scored two stoppage-time goals to beat Bayern Munich and win the treble in the most dramatic UCL final ever.']
                ] as $img)
                    <a href="{{ asset($img['src']) }}" class="glightbox" data-gallery="match-gallery" data-title="{{ $img['caption'] }}">
                        <img src="{{ asset($img['src']) }}" alt="{{ $img['caption'] }}" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    </a>
                @endforeach
            </div>
        </section>


        <!-- 📞 Contact Information -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">📞 Get in Touch</h2>
            <div class="bg-white shadow-md p-4 rounded-lg">
                <p class="text-gray-800">Email: <a href="mailto:contact@footballblog.com" class="text-blue-500">contact@footballblog.com</a></p>
                <p class="text-gray-800">Follow us on <a href="#" class="text-blue-500">Twitter</a> | <a href="#" class="text-blue-500">Instagram</a></p>
            </div>
        </section>
    </div>
@endsection
<!-- Include GLightbox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        GLightbox({ selector: '.glightbox' });
    });
</script>
