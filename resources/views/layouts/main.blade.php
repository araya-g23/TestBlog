<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('posts.index') }}">News</a>
    <a href="{{ route('teams.index') }}">Teams</a>
    <a href="{{ route('matches.index') }}">Fixtures</a>
    <a href="{{ route('contact.show') }}">Contact</a>
</nav>


<div class="content">
    @yield('content')
</div>

<footer>
    <p>&copy; 2025 Football Blog</p>
</footer>
</body>
</html>
