<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rating page</title>
    <link rel="stylesheet" href="{{ asset('css-lul/rating-style.css') }}">
    <script defer src="{{ asset('js-lul/rating-script.js') }}"></script>
</head>

<header>
    @include('nav-bar');
</header>

<body>
<div class="write_review">
    <div class="rating_section">
        <div class="review_form">
            <form id="submit_form" action="review" method="POST">
                @csrf
                <p>Title</p>
                <input type="text" id="title" name="title" placeholder="A fancy title?" maxlength="255">
                <p>Platform</p>
                <select id="platform" name="platform">
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                    <option value="Xbox360">Xbox 360</option>
                    <option value="XboxOne">Xbox One</option>
                    <option value="PC">PC</option>
                </select>
                <p>Content</p>
                <textarea name="content" id="content" type="text" rows="5" cols="33" maxlength="255" class="textContent" placeholder="Write your review..."></textarea>
                <p>Rating<span class="red_highlight">*</span></p>
                <select id="rating" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input id="review_submit" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="headline">
        <div class="headline_image">
            <img src={{ $game->image_link }}>
        </div>
        <div class="headline_text">
            <h2 id="gameName">{{ $game->name }}</h2>
            <h3><span>{{ number_format($game->aggregate_rating, 2) }} / 5</span> | {{$game->release_date}} |</h3>
        </div>
    </div>
</div>
<div id="other_reviews">

</div>
</body>
</html>
