@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Teams</h1>

        <form method="GET" action="{{ route('teams.index') }}" class="mb-4">
            <div class="flex space-x-2">
                <input type="text" name="search" placeholder="Search teams..." class="flex-1 border p-2 rounded-lg">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </div>
        </form>

        <!-- 📜 Scrollable table container -->
        <div class="overflow-y-scroll max-h-[400px] border rounded-lg shadow">
            <table class="min-w-full text-left divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white sticky top-0">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Stadium</th>
                    <th class="px-4 py-2">Coach</th>
                    <th class="px-4 py-2">Founded</th>
                    <th class="px-4 py-2">Logo</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach($teams as $team)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 text-blue-600 font-medium">
                            <a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a>
                        </td>
                        <td class="px-4 py-2">{{ $team->stadium }}</td>
                        <td class="px-4 py-2">{{ $team->coach }}</td>
                        <td class="px-4 py-2">{{ $team->founded }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('images/' . $team->logo) }}" alt="{{ $team->name }}" class="w-10 h-10 object-contain">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
