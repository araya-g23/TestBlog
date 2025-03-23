<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navbar -->
<nav class="bg-black text-white p-4" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold">⚽ Blog</a>

        <!-- Hamburger -->
        <button @click="open = !open" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6 items-center">
            <li><a href="{{ route('home') }}" class="hover:text-green-400">Home</a></li>
            <li><a href="{{ route('blog.index') }}" class="hover:text-green-400">All News</a></li>
            <li><a href="{{ route('teams.index') }}" class="hover:text-green-400">Teams</a></li>
            <li><a href="{{ route('fixtures.index') }}" class="hover:text-green-400">Fixtures</a></li>
            <li><a href="{{ route('contact.show') }}" class="hover:text-green-400">Contact</a></li>

            @auth
                <li><a href="{{ route('blog.create') }}" class="text-green-400 font-semibold">Create Post</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-400">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="hover:text-green-400">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-green-400">Register</a></li>
            @endauth
        </ul>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open" class="md:hidden mt-3 bg-gray-800 rounded-lg px-6 py-4 space-y-2">
        <a href="{{ route('home') }}" class="block hover:text-green-400">Home</a>
        <a href="{{ route('blog.index') }}" class="block hover:text-green-400">All News</a>
        <a href="{{ route('teams.index') }}" class="block hover:text-green-400">Teams</a>
        <a href="{{ route('fixtures.index') }}" class="block hover:text-green-400">Fixtures</a>
        <a href="{{ route('contact.show') }}" class="block hover:text-green-400">Contact</a>

        @auth
            <a href="{{ route('blog.create') }}" class="block text-green-400">Create Post</a>
            <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left hover:text-red-400">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block hover:text-green-400">Login</a>
            <a href="{{ route('register') }}" class="block hover:text-green-400">Register</a>
        @endauth
    </div>
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
