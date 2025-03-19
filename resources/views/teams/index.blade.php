@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Teams</h1>
        <form action="{{ route('teams.index') }}" method="GET" class="mb-6">
            <input type="text" name="search" placeholder="Search teams..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Search</button>
        </form>
        <!-- Teams Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Stadium</th>
                    <th class="px-4 py-2">Coach</th>
                    <th class="px-4 py-2">Founded</th>
                    <th class="px-4 py-2">Logo</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach ($teams as $team)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $team->name }}</td>
                        <td class="px-4 py-2">{{ $team->stadium }}</td>
                        <td class="px-4 py-2">{{ $team->coach }}</td>
                        <td class="px-4 py-2">{{ $team->founded }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ $team->logo }}" alt="{{ $team->name }}" class="w-12 h-12 rounded-full">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
