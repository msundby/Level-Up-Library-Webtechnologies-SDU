<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/review', [ReviewController::class, 'insertOne']);
Route::delete('/review/{id}', [ReviewController::class, 'deleteOne']);
Route::put('/review/{id}', [ReviewController::class, 'updateOne']);

Route::post('/gamepage/{name}/review', [ReviewController::class, 'insertOne']);
Route::get('/gamepage/{name}/review', [ReviewController::class, 'fetchByGame']);


