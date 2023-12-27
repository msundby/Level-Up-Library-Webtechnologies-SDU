
<x-app-layout>
    <div class="wrapper">

        @if(auth()->check() && auth()->user()->is_admin)
            <script defer src="{{ asset('js-lul/admin.js') }}"></script>
            <h3 class = reviewTitle>Games in LUL</h3>
            <button class="btns" id="create_game">Create New Game</button>
            <form id="game_form" action="/game" method="POST" style="display: none;">
            @csrf
            <input type='text' name='name' placeholder='Game Name' required>
            <textarea name='description' placeholder='Description' required></textarea>
            <input type='text' name='image_link' placeholder='Image Link' required>
            <input type='date' name='release_date' placeholder='Release Date' required>
            <input type='submit' value='Submit'>
            <button type='button' id='discard'>Discard</button>
            </form>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="all_games" id="all_games">
            @foreach($games as $game)
                <div class="game" id="{{$game->game_id}}div">
                    <img class="game_image" id="{{$game->game_id}}img" src="{{$game->image_link}}" alt="Image of game">
                    <h3 class="game_name" id="{{$game->game_id}}name">{{$game->name}}</h3>
                    <h5 class="game_rating" id="{{$game->game_id}}rating">Rating: {{$game->aggregate_rating}}</h5>
                    <p class="game_description" id="{{$game->game_id}}description">{{$game->description}}</p>
                    <p class="game_release" id="{{$game->game_id}}release">{{$game->release_date}}</p>
                    <div class="btns" id="{{$game->game_id}}btns">
                        <button class="delete" onclick="deleteGame('{{$game->game_id}}')">Remove game</button>
                        <button class="edit" onclick="editGame('{{$game->game_id}}')">Edit game</button>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <h3 class = reviewTitle>My Reviews</h3>
            <div class="user-reviews">
                @foreach($reviews as $review)
                <div class="container">
                    <div id="{{$review->review_id}}div" class="review">
                        <img id="{{$review->review_id}}img" src="{{ $review->game->image_link }}">
                        <h2 class="reviewtitle">Game:</h2>
                        <h3 id="{{$review->review_id}}h3-gameTitle">{{ $review->game->name }}</h3>
                        <h2 class="reviewtitle">Title:</h2>
                        <h3 id="{{$review->review_id}}h3-reviewTitle" class="editable">{{ $review->title }}</h3>
                        <h2 class="reviewtitle">Content:</h2>
                        <h3 id="{{$review->review_id}}h3-reviewContent" class="editable">{{ $review->content }}</h3>
                        <h2 class="reviewtitle">Rating:</h2>
                        <p id="{{$review->review_id}}p-Rating" class="editable">{{ $review->rating }}</p>
                    </div>
                    <div class="action-buttons">
                        <button class="edit" id="{{$review->review_id}}edit" onClick="editReview('{{ $review->review_id }}')">Edit</button>
                        <button class="delete" id="{{$review->review_id}}delete" onclick="deleteReview('{{ $review->review_id }}')">Delete</button>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <script defer src="{{ asset('js-lul/dashboard.js') }}"></script>



</x-app-layout>
