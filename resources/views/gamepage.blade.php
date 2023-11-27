<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level Up Library</title>
    <link rel="stylesheet" href="{{ asset('css-lul/gamepage.css') }}">
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
                <div class="game-title">{{ $game->name }}</div>
                <div class="game-description">
                    <p>{{$game->description}}</p>
                </div>
                <button class="read-more-button">Read More</button>
            </div>
            <div class="game-image">
                <a href="#"><img src={{$game->image_link}} id="game-image" alt="image"></a>
            </div>
        </div>

        <div class="game-publisher">
            Publisher: Bethesda
        </div>
        <div class="release-date">
            Release date: Sep 6, 2023
        </div>
        <div class="game-tags">
            <ul> Tags:
                <li>Single Player</li>
                <li>Role Playing Game</li>
                <li>First-Person Shooter</li>
                <li>Open World</li>

            </ul>
        </div>
        <div class="review-box">
            Highlighted User Reviews:
            <ul>
                <li>FalloutBoy_xXx:</li>
                <li>MrGameAficionado:</li>
                <li>FourTwentyBl4Z3:</li>
            </ul>
            <button class="review-page-button" onclick="document.location.href='{{$game->name}}/rating'">
                Review Page
            </button>
        </div>
    </div>

</body>
</html>
