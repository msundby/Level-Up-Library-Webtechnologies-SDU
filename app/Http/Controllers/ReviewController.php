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
    function insertOne(Request $request, $gameName) {
        if (auth()->user() == null) {
            // Try catch if user is not logged in
            //TODO: Add redirect to log in page
            return redirect('/');
        }
        $gameByName = DB::table('games')->where('name', $gameName)->first();
        $game_id = $gameByName->game_id;
        $user_id = auth()->user()->id;
        $title = $request->get('title');
        $platform = $request->get('platform');
        $content = $request->get('content');
        $rating = $request->get('rating');
        DB::insert('insert into reviews (user_id, game_id, title, platform, content, rating) values (?, ?, ?, ?, ?, ?)', [$user_id, $game_id, $title, $platform, $content, $rating]);
        return Redirect::to(url()->previous());
        //return [$request, $game_id];
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
        return DB::select('select * from reviews where game_id = :game_id', ['game_id' => $game_id]);
    }
}
