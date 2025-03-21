<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navbar -->
<nav class="bg-black text-white p-4">
    <ul class="flex justify-between items-center">
        <div class="flex space-x-6">
            <!-- Home Link -->
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>

            <!-- Blog (News) -->
            <li><a href="{{ route('blog.index') }}" class="hover:underline">All News</a></li>

            <!-- Other Links -->
            <li><a href="{{ route('teams.index') }}" class="hover:underline">Teams</a></li>
            <li><a href="{{ route('matches.index') }}" class="hover:underline">Fixtures</a></li>
            <li><a href="{{ route('contact.show') }}" class="hover:underline">Contact</a></li>

            <!-- Create Post (Visible Only to Logged-in Users) -->
            @if(Auth::check())
                <li><a href="{{ route('blog.create') }}" class="hover:underline text-green-400">Create Post</a></li>
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
