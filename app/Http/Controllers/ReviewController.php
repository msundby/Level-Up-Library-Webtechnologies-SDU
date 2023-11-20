<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //php artisan make:controller ReviewController
    function index() {
        //Returnerer stadig et array, selvom der er 1 hit
        //return DB::select('select * from users where name = :name', ['name' => 'Mathias']);
        //return DB::select('select * from users');
        //return "Hello from profile controller!";

        return DB::select('select * from test_table');
    }
    //$users = DB::select('select * from users where active = ?', [1]);
    //return view('user.index', ['users' => $users]);

    //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
    //Old https://laravel.com/docs/5.0/database
    //New https://laravel.com/docs/9.x/database


    function insertion(Request $req)
    {
        $title = $req->get('title');
        $platform = $req->get('platform');
        $content = $req->get('content');
        $score = $req->get('score');
        DB::insert('insert into test_table (title, platform, content, score) values (?, ?, ?, ?)', [$title, $platform, $content, $score]);
        return view('rating-page');

    }
}
