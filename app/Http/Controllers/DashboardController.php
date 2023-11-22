<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        $reviews = auth()->user()->reviews()->with('game')->get();

        return view('dashboard', ['reviews' => $reviews]);
    }
}
