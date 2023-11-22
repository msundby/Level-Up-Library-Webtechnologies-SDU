<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    function fetchAll()
    {
        return DB::select('select * FROM reviews');
    }
    function insertOne(Request $request) {
        $user_id = auth()->user()->id;
        $game_id = 1;
        $title = $request->get('title');
        $platform = $request->get('platform');
        $content = $request->get('content');
        $rating = $request->get('rating');
        DB::insert('insert into reviews (user_id, game_id, title, platform, content, rating) values (?, ?, ?, ?, ?, ?)', [$user_id, $game_id, $title, $platform, $content, $rating]);
        return $title;
    }
    function fetchFromID($userid) {
        return DB::select('select * from reviews where user_id = :user_id', ['user_id' => $userid]);
    }
}
