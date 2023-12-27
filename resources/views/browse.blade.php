<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Browse All Games</title>
  <script defer src="{{ asset('js-lul/browse.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css-lul/browse.css') }}">
</head>
    <header>
        @include('nav-bar')
    </header>
<body>

<div id="searchDiv">
<form method="GET" action="{{ route('games.browse') }}">
    <input type="text" name="search" placeholder="Search by Name">
    <button type="submit">Search</button>
</form>
</div>

<div class="filter-links">
<a class="filter-a" href="{{ route('games.browse', ['sort' => 'name','search' => request('search')]) }}">Sort by Name (A-Z)</a>
<a class ="filter-a" href="{{ route('games.browse', ['sort' => 'aggregate_rating','order' => 'desc','search' => request('search')]) }}">Sort by Rating (Highest)</a>
<a class ="filter-a" href="{{ route('games.browse', ['sort' => 'aggregate_rating','search' => request('search')]) }}">Sort by Rating (Lowest)</a>
<a class="filter-a" href="{{ route('games.browse', ['sort' => 'release_date', 'order' => 'desc','search' => request('search')]) }}">Sort by Release Date (Newest)</a>
<a class="filter-a" href="{{ route('games.browse', ['sort' => 'release_date','search' => request('search')]) }}">Sort by Release Date (Oldest)</a>
</div>

<div id="allgames">
    @foreach ($games as $game)
    <article id="game_container">
        <a id="pictureLink" href="/gamepage/{{$game->name}}">
            <img class="img" src={{$game->image_link}}>
        </a>
        <div class="overlay">
            <div class="overlay-content">
                <h3 id="featured-title"><a id="titleLink" style="text-decoration: none; color: inherit;" href="/gamepage/{{$game->name}}">{{$game->name}}</a></h3>
                <p id="featured-snippet">{{$game->description}}</p>
                <div id="rating">
                    <h3>{{ number_format($game->aggregate_rating, 1) }} / 5<label id="rating"></label></h3>
                </div>
            </div>
        </div>
    </article>
    @endforeach
</div>


{{ $games->links() }}
</body>
</html>
