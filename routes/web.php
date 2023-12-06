<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ErrorController;
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

// Root
Route::get('/', [GameController::class, 'welcomeOurFavorites'])
    ->name('home');



/*API calls
Key takeaway: returns data instead of a view
TODO: Move to API folder
*/
Route::get('/games', [GameController::class, 'index']);
Route::get('/all-reviews',[ReviewController::class,'fetchAll']);
Route::get('/review', [ReviewController::class, 'fetchAll']);
Route::get('/review/{userid}', [ReviewController::class, 'fetchFromID']);

//API as well, but for inserting some data
Route::post('/review', [ReviewController::class, 'insertOne']);
Route::delete('/review/{id}', [ReviewController::class, 'deleteOne']);
Route::put('/review/{id}', [ReviewController::class, 'updateOne']);


/*TODO:
    1. Implement custom error page
    2. Route pages here, with try catch
*/
Route::get('/error', [ErrorController::class, 'index']);
Route::get('/error/{error}', [ErrorController::class, 'knownError']);

//All relevant routes for the gamepage and the reviews here of
Route::get('/gamepage/{name}', [GameController::class,'show']);
Route::get('/gamepage/{name}/rating', [GameController::class,'rate']);
Route::get('/gamepage/{name}/review', [ReviewController::class, 'fetchByGame']);
Route::post('/gamepage/{name}/review', [ReviewController::class, 'insertOne']);
//Route::get('/gamepage/{id}', function() {
//    return view('gamepage');
//});

Route::get('/top-picks', [GameController::class,'topPicks']);

Route::get('/loginForm', function(){
    return view('loginForm');
});

Route::get('/browse', function () {
    return view('browse');
});

Route::get('/testing', [TestingController::class, 'showReviewByAuthenticatedUser']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('/rating', 'rating-page');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
