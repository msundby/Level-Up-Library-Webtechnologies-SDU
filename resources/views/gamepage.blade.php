<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level Up Library</title>
    <link rel="stylesheet" href="{{ asset('css-lul/gamepage.css') }}">
    <script defer src="{{ asset('js-lul/gamepage.js') }}"></script>
    <script src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
       @include ('nav-bar')
    </header>
    <div class="game-cover-image">
    </div>
    <div class="container2">
        <div class="game-container-header"></div>
        <div class="game-info-container">
            <div class="game-info-left">
                <div class="game-title" id="gameName">{{ $game->name }}</div>
                <div class="game-description">
                    <p>{{$game->description}}</p>
                </div>
            </div>
            <div class="game-image">
                <a href="#"><img src={{$game->image_link}} id="game-image" alt="image"></a>
            </div>
        </div>

        <div class="game-publisher">
            Publisher: WIP
        </div>
        <div class="release-date">
            Release date: {{$game->release_date}}
        </div>
        <!--
        <div class="game-tags">
            <ul> Tags:
                <li>WIP</li>
                <li>Single Player</li>
                <li>Role Playing Game</li>
                <li>First-Person Shooter</li>
                <li>Open World</li>

            </ul>
        </div>
       -->

        <div class="review-box">
            Highlighted User Reviews:
            <ul id="user_reviews">
                <!-- Bad attempt at skeleton -->
                <li class="fetching_skeleton">Fetching ... </li>
                <li class="fetching_skeleton">Fetching ... </li>
                <li class="fetching_skeleton">Fetching ... </li>
            </ul>
            @guest
            <button class="review-page-button" onclick="document.location.href='/login'">
                Login to review this game
            </button>
            @endguest
            @auth
            <section class="game_buttons">
                <button class="review-page-button" onclick="document.location.href='{{$game->name}}/rating'">
                    Review game
                </button>
                <button class="review-page-button" onclick="document.location.href='{{$game->name}}/review-page'">See all reviews</button>
            </section>
            @endauth
        </div>
    </div>

</body>
</html>
