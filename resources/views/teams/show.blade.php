@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Team Header -->
            <div class="flex items-center mb-6">
                <img src="{{ asset('storage/' . $team->logo) }}" class="h-24 w-24 rounded-full" alt="{{ $team->name }}">
                <div class="ml-6">
                    <h1 class="text-4xl font-bold">{{ $team->name }}</h1>
                    <p class="text-gray-600">🏟️ Stadium: {{ $team->stadium }}</p>
                    <p class="text-gray-600">👔 Coach: {{ $team->coach }}</p>
                    <p class="text-gray-600">📅 Founded: {{ $team->founded }}</p>
                </div>
            </div>

            <!-- Players Section -->
            <h2 class="text-2xl font-semibold mt-6">Players</h2>
            <ul class="list-disc pl-6">
                @forelse($team->players as $player)
                    <li class="text-lg">{{ $player->name }} - Position: {{ $player->position }}</li>
                @empty
                    <p class="text-gray-500">No players found.</p>
                @endforelse
            </ul>

            <!-- Matches Section -->
            <h2 class="text-2xl font-semibold mt-6">Recent Matches</h2>
            <table class="min-w-full bg-white shadow-md rounded mt-4">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Opponent</th>
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6">Score</th>
                </tr>
                </thead>
                <tbody>
                @forelse($team->matches as $match)
                    <tr class="border-b">
                        <td class="py-3 px-6">{{ $match->opponent }}</td>
                        <td class="py-3 px-6">{{ $match->date }}</td>
                        <td class="py-3 px-6">{{ $match->score }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-3 px-6 text-center text-gray-500">No matches found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
