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
<div id="allgames">
    @foreach ($games as $game)
    <div class="grid-item">
        <img id="{{$game->game_id}}img" src="{{ $game->image_link }}">
        <div class="overlay">
            <div class="overlay-content">
                <h3 class="image-title">Resident Evil 4</h3>
                <div class="rating-grid">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


{{ $games->links() }}
</body>
</html>
