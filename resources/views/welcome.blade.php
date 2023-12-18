<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css-lul/index-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css-lul/Extension-Carousel.css') }}">
    <script defer src="{{ asset('js-lul/index-script.js') }}"></script>
    <script defer src="{{ asset('js-lul/itemCarousel.js') }}"></script>

    <title>Document</title>
</head>
<body>
<header>
    @include('nav-bar')
</header>
<div class="topBanner">
<section class="hero">
    <h1>Welcome to the Ultimate Game Library</h1>
    <h2>Discover new games, read reviews, and level up your gaming experience!</h2>
    <div id="action_buttons">
    <a href="browse">
      <button id="get_started">
        Get Started
      </button>
    </a>
    <a href="register">
      <button id="get_started">
        Register
      </button>
    </a>
    </div>
</section>
</div>

<div class="underbar"></div>



<div class="fixed-container">
<section class="carousel_collection">
    <h1 class="carousel_header">BEST RATED GAMES</h1>
    <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
    <div class="carousel_container" id="carousel_container">
    </div>
</section>
</div>

<div class="favorite">
    <h1 class="headliner1">OUR FAVORITES RIGHT NOW</h1>
</div>
<section class="featured-games">
    <article class ="game">
        <a href="/gamepage/{{$game1->name}}">
            <img src={{$game1->image_link}}>
        </a>
        <h3 class="featured-title">{{$game1->name}}</h3>
        <p class="featured-snippet">{{$game1->description}}</p>
        <div class ="rating">
            {{$game1->aggregate_rating}} / 5
        </div>
    </article>

    <article class ="game">
        <a href="/gamepage/{{$game2->name}}">
            <img src={{$game2->image_link}}>
        </a>
        <h3 class="featured-title">{{$game2->name}}</h3>
        <p class="featured-snippet">{{$game2->description}}</p>
        <div class ="rating">
            {{$game2->aggregate_rating}} / 5
        </div>
    </article>

    <article class ="game">
        <a href="/gamepage/{{$game3->name}}">
            <img src={{$game3->image_link}}>
        </a>
        <h3 class="featured-title">{{$game3->name}}</h3>
        <p class="featured-snippet">{{$game3->description}}</p>
        <div class ="rating">
            {{$game3->aggregate_rating}} / 5
        </div>
    </article>


    </article>
</section>

<div class="fixed-container">
<section class="game_collection">
    <div class="grid" id="gridGamesNewestGames">
        <h1 class="headliner">NEWEST GAMES</h1>
    </div>
</section>
</div>




</body>
</html>
