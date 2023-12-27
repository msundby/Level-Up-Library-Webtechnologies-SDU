<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    /** Index with view */
    public function indexWithView()
    {
        $games = Game::all();
        return view('admin.games',['games' => $games]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_link' => 'required',
            'release_date' => 'required'
        ]);
        Game::create($validatedData);
        return redirect('/dashboard');
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

        // TODO Validation
        $game = Game::findOrFail($id);
        $game->update($request->json()->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Game::where('game_id', $id)->first()->delete();
    }


    public function showReviewPage($name) {
        $gameByName = DB::table('games')->where('name', $name)->first();
        $game_id = $gameByName->game_id;
        $response = DB::table('reviews')->join('users', 'reviews.user_id', '=', 'users.id')->where('game_id', $game_id)->select('reviews.*', 'users.name')->get();
        return view('review-page', ['reviews' => $response, 'game' => $gameByName]);
    }

    public function topPicks() {
        $topPicks = DB::table('games')
            ->orderBy('aggregate_rating', 'desc')
            ->limit(3) // Adjust the limit as needed
            ->get();

        return view('toppicks', ['topPicks' => $topPicks]);
    }
}
