<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight profileName">
            {{ auth()->user()->name }}'s Profile
        </h2>
    </x-slot>
    <!-- This code has a bug, if you open all the edits of a line -->
    <div class="wrapper">
        <h3>My Reviews</h3>
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
                    <button class="delete" id="{{$review->review_id}}delete" onclick="deleteReview('{{ $review->review_id }}')">Delete</button>
                    <button class="edit" id="{{$review->review_id}}edit" onClick="editReview('{{ $review->review_id }}')">Edit</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script defer src="{{ asset('js-lul/dashboard.js') }}"></script>



</x-app-layout>
