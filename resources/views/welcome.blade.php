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


<section class="game_collection">
    <div class="grid" id="gridGamesTopRated">
    <h1 class="headliner">BEST RATED GAMES</h1>
</section>


</div>
<section class="game_collection">
    <div class="grid" id="gridGamesNewestGames">
    <h1 class="headliner">NEWEST GAMES</h1>
</section>

</div>

<section class="headliner">
    <h1>OUR FAVORITES RIGHT NOW</h1>
</section>
<section class="featured-games">
    <article class ="game">
        <img src="https://images.hindustantimes.com/tech/img/2023/09/06/960x540/Baldur_Gate_3_1694006233080_1694006237849.jpg">
        <h3 class="featured-title">Baldurs gate 3</h3>
        <p class="featured-snippet">Dive into an epic Dungeons & Dragons adventure filled with mythical battles and choices.
            Shape your destiny as you confront monsters, forge alliances, and unravel mysteries.
            Experience a captivating story and immerse yourself in the rich lore of the Forgotten Realms.</p>
        <div class ="rating">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </article>

    <article class ="game">
        <img src="https://assets.hardwarezone.com/img/2023/03/cs2.jpg">
        <h3 class="featured-title">Counter Strike 2</h3>
        <p class="featured-snippet">Engage in intense tactical warfare with teammates in this legendary first-person shooter.
            Plan strategies, defuse bombs, and eliminate terrorists in thrilling, team-based matches.
            Sharpen your reflexes, communication, and teamwork skills to become a top-ranked CS:2 player.</p>
        <div class ="rating">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </article>

    <article class ="game">
        <img src="https://image.api.playstation.com/vulcan/ap/rnd/202108/0410/2odx6gpsgR6qQ16YZ7YkEt2B.png">
        <h3 class="featured-title">Elden ring</h3>
        <p class="featured-snippet">Embark on an epic action RPG journey through a breathtaking, mystical world.
            Uncover ancient secrets, battle formidable foes, and wield powerful magic and weaponry.
            With its rich lore and open-world exploration, Elden Ring promises an unforgettable adventure.</p>
        <div class ="rating">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </article>
</section>


</body>
</html>
