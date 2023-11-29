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
