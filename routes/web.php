<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/gamepage/{name}', [GameController::class,'show']);
//Added by Marcus - The rating page per game
Route::get('/gamepage/{name}/rating', [GameController::class,'rate']);

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
Route::get('/all-reviews',[ReviewController::class,'fetchAll']);

Route::get('/nav-bar-test', function () {
    return view('nav-bar');
});


Route::get('/testing', [TestingController::class, 'showReviewByAuthenticatedUser']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('/rating', 'rating-page');
Route::get('/review', [ReviewController::class, 'fetchAll']);
Route::post('/review', [ReviewController::class, 'insertOne']);
Route::get('/review/{userid}', [ReviewController::class, 'fetchFromID']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
