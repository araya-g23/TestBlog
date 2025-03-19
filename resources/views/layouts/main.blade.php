<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js for interactive dropdowns -->
    <script src="https://unpkg.com/alpinejs@3.5.2/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navbar -->
<nav class="bg-black text-white p-4">
    <ul class="flex justify-between items-center">
        <div class="flex space-x-6">
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>

            <!-- Dropdown for News -->
            <li class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:underline focus:outline-none">News ▾</button>
                <ul x-show="open" x-transition @click.away="open = false"
                    class="absolute left-0 mt-2 w-48 bg-black text-white shadow-lg rounded z-50">
                    @foreach(\App\Models\Category::whereIn('name', ['Transfers', 'Match Reports'])->get() as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->id) }}"
                               class="block px-4 py-2 hover:bg-gray-700">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li><a href="{{ route('teams.index') }}" class="hover:underline">Teams</a></li>
            <li><a href="{{ route('matches.index') }}" class="hover:underline">Fixtures</a></li>
            <li><a href="{{ route('contact.show') }}" class="hover:underline">Contact</a></li>

            <!-- Create Post (Visible Only to Logged-in Users) -->
            @if(Auth::check())
                <li><a href="{{ route('posts.create') }}" class="hover:underline text-green-400">Create Post</a></li>
            @endif
        </div>

        <!-- Authentication Links -->
        <div class="flex space-x-6">
            @guest
                <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
            @else
                <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            @endguest
        </div>
    </ul>
</nav>

<!-- Main Content -->
<div class="container mx-auto p-6">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center p-4 mt-6 bg-black text-white">
    <p>&copy; 2025 Football Blog</p>
</footer>

</body>
</html>
