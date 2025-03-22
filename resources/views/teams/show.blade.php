@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <a href="{{ route('teams.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
            ← Back to Teams
        </a>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-6">
                <img src="{{ asset('storage/' . $team->logo) }}" class="h-24 w-24 rounded-full" alt="{{ $team->name }}">
                <div class="ml-6">
                    <h1 class="text-4xl font-bold">{{ $team->name }}</h1>
                    <p class="text-gray-600">🏟️ Stadium: {{ $team->stadium }}</p>
                    <p class="text-gray-600">👔 Coach: {{ $team->coach }}</p>
                    <p class="text-gray-600">📅 Founded: {{ $team->founded }}</p>
                </div>
            </div>
            @auth
                @if(auth()->user()->followedTeams->contains($team->id))
                    <form method="POST" action="{{ route('teams.unfollow', $team->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-4 py-2 rounded mt-4">Unfollow</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('teams.follow', $team->id) }}">
                        @csrf
                        <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Follow</button>
                    </form>
                @endif
            @endauth



            {{-- Players table (styled) --}}
            <h2 class="text-2xl font-semibold mt-6">Players</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md mt-4">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-semibold">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold">Position</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @forelse($team->players as $player)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $player->name }}</td>
                            <td class="py-3 px-6">{{ $player->position }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-4 px-6 text-center text-gray-500">No players found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Trophies section --}}
            <h2 class="text-2xl font-semibold mt-6">🏆 Trophies</h2>
            <ul class="list-disc pl-6">
                @forelse($team->trophies as $trophy)
                    <li class="text-lg">{{ $trophy->title }} - {{ $trophy->year }}</li>
                @empty
                    <p class="text-gray-500">No trophies found.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
