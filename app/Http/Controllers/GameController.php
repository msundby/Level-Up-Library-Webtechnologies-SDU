<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
*/
    public function welcomeOurFavorites(){

        $game1 = DB::table('games')->where('game_id', 8)->first();
        $game2 = DB::table('games')->where('game_id', 15)->first();
        $game3 = DB::table('games')->where('game_id', 10)->first();

        return view('welcome', ['game1'=>$game1,'game2'=>$game2,'game3'=>$game3]);
    }


    public function index()
    {
        return Game::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $game = DB::table('games')->where('name', $name)->first();
        //return $game;
        return view('gamepage', ['game' => $game]);
    }

    public function rate($name)
    {
        if (auth()->user() == null) {
            //TODO: Add redirect to log in page
            $rating_error = "Login to rate this game";
            return view('auth/loginForm', ['rating_error' => $rating_error]) ;
        }
        $game = DB::table('games')->where('name', $name)->first();
        return view('rating-page', ['game' => $game]);
    }

    public function showReviewPage($name) {
        $game = DB::table('games')->where('name', $name)->first();
        $reviews = DB::table('reviews')->select('title', 'rating', 'review_id')->where('game_id', $game->game_id);
        return view('review-page', ['']);


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function topPicks() {
        $topPicks = DB::table('games')
            ->orderBy('aggregate_rating', 'desc')
            ->limit(3) // Adjust the limit as needed
            ->get();

        return view('toppicks', ['topPicks' => $topPicks]);
    }
}
