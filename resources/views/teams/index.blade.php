@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-6xl font-bold mb-4">Teams</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Logo</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Stadium</th>
                <th class="border px-4 py-2">Coach</th>
                <th class="border px-4 py-2">Founded</th>
            </tr>
            </thead>
            <tbody>
            @forelse($teams as $team)
                <tr>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }} Logo" class="w-16 h-16">
                    </td>
                    <td class="border px-4 py-2">{{ $team->name }}</td>
                    <td class="border px-4 py-2">{{ $team->stadium }}</td>
                    <td class="border px-4 py-2">{{ $team->coach }}</td>
                    <td class="border px-4 py-2">{{ $team->founded }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No teams available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
