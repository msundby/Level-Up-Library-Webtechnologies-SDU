<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //php artisan make:controller ReviewController
    function index() {
        //return DB::select('select * from users');
        //return "Hello from profile controller!";
    }

    //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
    //https://laravel.com/docs/5.0/database
}
