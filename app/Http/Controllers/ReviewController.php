<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    function fetchAll(Request $request)
    {
        return DB::select('select * FROM reviews');

    }
    function updateOne(Request $request) {

        $reviewId = $request->get('reviewId');
        $title = $request->get('title');
        $content = $request->get('content');
        $rating = $request->get('rating');
        DB::table('reviews')->where('review_id',$reviewId)->update([
            'title'=>$title, 'content'=>$content, 'rating'=>$rating
        ]);

    }

    function insertOne(Request $request, $gameName) {
        if (auth()->user() == null) {
            // Try catch if user is not logged in
            //TODO: Could be changed to redirect to login if it fits
            return redirect('/');
        }
        $gameByName = DB::table('games')->where('name', $gameName)->first();

        $this->validateReviewInput($request); #Extension

        $game_id = $gameByName->game_id;
        $user_id = auth()->user()->id;
        $title = $request->get('title');
        $platform = $request->get('platform');
        $content = $request->get('content');
        $rating = $request->get('rating');
        DB::insert('insert into reviews (user_id, game_id, title, platform, content, rating) values (?, ?, ?, ?, ?, ?)',
                    [$user_id, $game_id, $title, $platform, $content, $rating]);
        return Redirect::to(url()->previous());
    }

    function fetchFromID($userid) {
        if (auth()->user() == null) {
            //TODO: Add redirect to log in page
            return redirect('/');
        }
            $currUser = auth()->user()->id;

        if ($currUser != $userid) {
            return "You are not authorized to see those reviews!";
        }
        return DB::select('select * from reviews where user_id = :user_id', ['user_id' => $userid]);
    }

    function fetchByGame($game_name) {
        $gameByName = DB::table('games')->where('name', $game_name)->first();
        $game_id = $gameByName->game_id;

        $response = DB::table('reviews')->join('users', 'reviews.user_id', '=', 'users.id')->where('game_id', $game_id)->select('reviews.*', 'users.name')->get();
        return $response;
    }

    function deleteOne($review_id){
        Review::where('review_id', $review_id)->first()->delete();
    }

    public function validateReviewInput(Request $request): void    #Extension
    {                                                               #Extension
        $request->validate([                                        #Extension
            'content' => 'required|min:10|max:255',                 #Extension
            'rating' => 'required|min:1|max:5',                     #Extension
            'title' => 'required|min:1|max:50'                      #Extension
        ]);                                                         #Extension
    }

}
