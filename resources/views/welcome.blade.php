<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css-lul/index-style.css') }}">
    <script defer src="{{ asset('js-lul/index-script.js') }}"></script>

    <title>Document</title>
</head>
<body>
<header>
    @include('nav-bar')
</header>
<section class="our-favorites">
    <p>Highest rated games</p>
</section>
<div class="grid" id="gridGamesTopRated">

</div>
<section class="our-favorites">
    <p>Newest games</p>
</section>
<div class="grid" id="gridGamesNewestGames">

</div>

<section class="our-favorites">
    <p>OUR FAVORITES RIGHT NOW</p>
</section>


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


</body>
</html>
