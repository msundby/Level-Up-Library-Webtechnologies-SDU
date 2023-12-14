<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rating page</title>
    <link rel="stylesheet" href="{{ asset('css-lul/review-style.css') }}">
<!--    <script defer src="{{ asset('js-lul/rating-script.js') }}"></script>-->
</head>

<header>
    @include('nav-bar');
</header>

<body>
    <div class="headline">
        <div class="headline_image">
            <img src={{ $game->image_link }}>
        </div>
        <div class="headline_text">
            <h2 id="gameName">{{ $game->name }}</h2>
            <h3><span>{{ number_format($game->aggregate_rating, 2) }} / 5</span> | {{$game->release_date}}</h3>
        </div>
    </div>
</div>
<div id="other_reviews">
    @foreach($reviews as $review)
    <div id="{{$review->review_id}}" class="review">
        <h3 class="reviewhead title">{{ $review->title }}</h3>
        <p class="reviewhead content">{{ $review->content }}</p>
        <p id="meta">Author: {{ $review->name }} | Rating: {{ $review->rating}}</p>
    </div>
    @endforeach
</div>
</body>
</html>
