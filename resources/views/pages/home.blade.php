@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">🏆 Welcome to the Football Blog 🏆</h1>
        <p class="text-center text-gray-600 mb-8">Stay updated with the latest football news, upcoming fixtures, and team rankings!</p>

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
            <h2 class="text-2xl font-semibold mb-4">⚽ Upcoming Matches</h2>
            <div class="bg-white shadow-md p-4 rounded-lg">
                @foreach($matches as $match)
                    <p class="text-gray-800">
                        <strong>{{ $match->homeTeam->name }}</strong> vs
                        <strong>{{ $match->awayTeam->name }}</strong> -
                        <span class="text-gray-600">{{ $match->date }}</span>
                    </p>
                @endforeach
            </div>
        </section>

        <!-- 🏆 Top Teams -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">🏆 Top Teams</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($teams as $team)
                    <div class="flex flex-col items-center bg-white shadow-md p-4 rounded-lg">
                        <img src="{{ asset('images/' . $team->logo) }}" alt="{{ $team->name }}" class="w-16 h-16 object-cover">
                        <p class="text-gray-800 font-semibold mt-2">{{ $team->name }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 📸 Latest Images -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">📸 Latest Images</h2>
            <div class="flex gap-6">
                <img src="{{ asset('images/match1.jpg') }}" class="w-40 h-40 object-cover rounded-lg shadow-md">
                <img src="{{ asset('images/match2.jpg') }}" class="w-40 h-40 object-cover rounded-lg shadow-md">
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
