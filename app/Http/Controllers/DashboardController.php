<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        if (auth()->user()->is_admin) {
            $games = Game::all();
            return view('dashboard', ['games' => $games]);
        } else {
            $reviews = auth()->user()->reviews()->with('game')->get();
            return view('dashboard', ['reviews' => $reviews]);
        }
    }
}
