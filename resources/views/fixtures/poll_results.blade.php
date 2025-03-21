@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">📊 Poll Results for {{ $fixture->home_team }} VS {{ $fixture->away_team }}</h2>

        <ul class="list-disc pl-6">
            <li>🏆 {{ $fixture->home_team }} Win: {{ $pollResults['home_win'] ?? 0 }} votes</li>
            <li>🏆 {{ $fixture->away_team }} Win: {{ $pollResults['away_win'] ?? 0 }} votes</li>
            <li>🤝 Draw: {{ $pollResults['draw'] ?? 0 }} votes</li>
        </ul>

        <a href="{{ route('fixtures.index') }}" class="text-blue-500 hover:underline mt-4 block">Back to Matches</a>
    </div>
@endsection
