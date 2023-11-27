<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level Up Library</title>
    <link rel="stylesheet" href="{{ asset('css-lul/toppicks.css') }}">
    <script defer src="{{ asset('js-lul/toppicks.js') }}"></script>
    <script src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    @include('nav-bar')
</header>

<h1 id="title">Top 3 rated games</h1>
<div id="top-picks">
    @foreach ($topPicks as $game)
    <div class="game">
        <h2>{{ $game->name }}</h2>
        <p class="description">{{ $game->description }}</p>
        <p class="rating">Aggregate Rating: {{ $game->aggregate_rating }}</p>
        <!-- Add more details as needed -->
    </div>
    @endforeach
</div>

</body>
</html>
