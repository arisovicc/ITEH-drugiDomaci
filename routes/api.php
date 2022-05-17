<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmTestController;
use App\Http\Controllers\WatchlistTestController;
use App\Http\Controllers\UserTestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/films/{id}', [FilmTestController::class, 'show']);
Route::get('/films', [FilmTestController::class, 'index']);

Route::get('/watchlists/{id}', [WatchlistTestController::class, 'show']);
Route::get('/watchlists', [WatchlistTestController::class, 'index']);

Route::get('/users/{id}', [UserTestController::class, 'show']);
Route::get('/users', [UserTestController::class, 'index']);

