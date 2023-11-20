<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //php artisan make:controller ReviewController
    function index() {
        //Returnerer stadig et array, selvom der er 1 hit
        return DB::select('select * from users where name = :name', ['name' => 'Mathias']);
        //return DB::select('select * from users');
        //return "Hello from profile controller!";
    }

    //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
    //https://laravel.com/docs/5.0/database
}
