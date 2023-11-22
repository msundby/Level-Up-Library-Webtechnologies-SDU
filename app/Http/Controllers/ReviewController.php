<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //
    function index()
    {
        return DB::select('select * FROM test_table');
    }
    function something(Request $request) {
        $title = $request->get('title');
        $platform = $request->get('platform');
        $content = $request->get('content');
        $rating = $request->get('rating');
        DB::insert('insert into test_table (title, platform, content, rating) values (?, ?, ?, ?)', [$title, $platform, $content, $rating]);
        return $request;
    }
}
