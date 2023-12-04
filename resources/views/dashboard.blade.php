<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ auth()->user()->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="user-reviews">
                        <h3>My Reviews</h3>
                        @foreach($reviews as $review)
                        <div id="{{$review->review_id}}div" class="review">
                            <h3 id="{{$review->review_id}}h3-gameTitle">Game: {{ $review->game->name }}</h3>
                            <h2>Title:</h2>
                            <h3 id="{{$review->review_id}}h3-reviewTitle" class="editable">{{ $review->title }}</h3>
                            <h2>Content:</h2>
                            <h3 id="{{$review->review_id}}h3-reviewContent" class="editable">{{ $review->content }}</h3>
                            <h2>Rating:</h2>
                            <p id="{{$review->review_id}}p-Rating" class="editable">{{ $review->rating }}</p>
                            <img id="{{$review->review_id}}img" src="{{ $review->game->image_link }}">
                            <button id="{{$review->review_id}}delete" onclick="deleteReview('{{ $review->review_id }}')">Delete</button>
                            <button id="{{$review->review_id}}edit" onClick="editReview('{{ $review->review_id }}')">Edit</button>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script defer src="{{ asset('js-lul/dashboard.js') }}"></script>



</x-app-layout>
