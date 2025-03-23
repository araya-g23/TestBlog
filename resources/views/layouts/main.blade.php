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
<nav class="bg-black text-white p-4 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Left: Logo -->
        <div class="flex items-center space-x-2">
            <span class="text-2xl">⚽</span>
            <a href="{{ route('home') }}" class="text-xl font-bold">Blog</a>
        </div>

        <!-- Center: Nav Links -->
        <ul class="hidden md:flex space-x-8 text-base font-medium">
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ route('blog.index') }}" class="hover:underline">All News</a></li>
            <li><a href="{{ route('teams.index') }}" class="hover:underline">Teams</a></li>
            <li><a href="{{ route('matches.index') }}" class="hover:underline">Fixtures</a></li>
            <li><a href="{{ route('contact.show') }}" class="hover:underline">Contact</a></li>
        </ul>

        <!-- Right: Auth Links -->
        <div class="hidden md:flex space-x-6">
            @auth
                <a href="{{ route('blog.create') }}" class="text-green-400 hover:underline">Create Post</a>
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="menuBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="md:hidden hidden mt-4 px-4 space-y-2">
        <a href="{{ route('home') }}" class="block hover:underline">Home</a>
        <a href="{{ route('blog.index') }}" class="block hover:underline">All News</a>
        <a href="{{ route('teams.index') }}" class="block hover:underline">Teams</a>
        <a href="{{ route('matches.index') }}" class="block hover:underline">Fixtures</a>
        <a href="{{ route('contact.show') }}" class="block hover:underline">Contact</a>

        @auth
            <a href="{{ route('blog.create') }}" class="block text-green-400 hover:underline">Create Post</a>
            <a href="{{ route('dashboard') }}" class="block hover:underline">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block hover:underline">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block hover:underline">Login</a>
            <a href="{{ route('register') }}" class="block hover:underline">Register</a>
        @endauth
    </div>

    <!-- Script to Toggle Mobile -->
    <script>
        document.getElementById('menuBtn').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
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
