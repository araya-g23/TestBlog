@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>🏆 Welcome to the Football Blog 🏆</h1>
        <p>Stay updated with the latest football news, upcoming fixtures, and team rankings!</p>

        <!-- 🔥 Featured News Section -->
        <section>
            <h2>🔥 Latest News</h2>
            @foreach($posts as $post)
                <article>
                    <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                    <p>{{ Str::limit($post->content, 100) }}...</p>
                </article>
            @endforeach
        </section>

        <!-- ⚽ Upcoming Matches -->
        <section>
            <h2>⚽ Upcoming Matches</h2>
            @foreach($matches as $match)
                <p>{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }} - {{ $match->date }}</p>
            @endforeach
        </section>

        <!-- 🏆 Top Teams -->
        <section>
            <h2>🏆 Top Teams</h2>
            <div style="display: flex; gap: 20px;">
                @foreach($teams as $team)
                    <div>
                        <img src="{{ asset('images/' . $team->logo) }}" alt="{{ $team->name }}" width="50">
                        <p>{{ $team->name }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 📸 Latest Images -->
        <section>
            <h2>📸 Latest Images</h2>
            <img src="{{ asset('images/match1.jpg') }}" width="150">
            <img src="{{ asset('images/match2.jpg') }}" width="150">
        </section>

        <!-- 📞 Contact Information -->
        <section>
            <h2>📞 Get in Touch</h2>
            <p>Email: contact@footballblog.com</p>
            <p>Follow us on <a href="#">Twitter</a> | <a href="#">Instagram</a></p>
        </section>
    </div>
@endsection
