<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/games', [GameController::class, 'index']);

Route::get('/gamepage/{id}', [GameController::class,'show']);

//Route::get('/gamepage/{id}', function() {
//    return view('gamepage');
//});



Route::get('/home', function () {
    return view('welcome');
});

Route::get('/test', function() {
    $user = DB::select("select * from users");
    dd($user);
});

Route::get('/browse', function () {
    return view('browse');
});

Route::get('/games',[GameController::class,'index']);

Route::get('/nav-bar-test', function () {
    return view('nav-bar');
});

Route::get('/testing', [TestingController::class, 'showReviewByAuthenticatedUser']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/rating', 'rating-page');
Route::get('/review', [ReviewController::class, 'index']);
Route::post('/review', [ReviewController::class, 'something']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
