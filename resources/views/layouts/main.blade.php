<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="bg-black text-white p-4">
    <ul class="flex space-x-6">
        <li><a href="{{ route('home') }}">Home</a></li>

        <!-- Dropdown for News -->
        <li class="relative group">
            <a href="#" class="hover:underline">News ▾</a>
            <ul class="absolute hidden bg-black text-white group-hover:block">
                @foreach(\App\Models\Category::whereIn('name', ['Transfers', 'Match Reports'])->get() as $category)
                    <li><a href="{{ route('categories.show', $category->id) }}" class="block px-4 py-2 hover:bg-gray-700">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>


        <li><a href="{{ route('teams.index') }}">Teams</a></li>
        <li><a href="{{ route('matches.index') }}">Fixtures</a></li>
        <li><a href="{{ route('contact.show') }}">Contact</a></li>
    </ul>
</nav>




<div class="content">
    @yield('content')
</div>

<footer>
    <p>&copy; 2025 Football Blog</p>
</footer>
</body>
</html>
