<?php

use App\Http\Controllers\OAuth\KnoxController;
use App\Http\Controllers\OAuth\SpotifyController;
use Filament\Http\Middleware\Authenticate;
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
    return view('home');
})->name('home');

Route::name('oauth.')->group(function () {
    Route::middleware(Authenticate::class)->name('spotify.')->group(function () {
        Route::get('/oauth/spotify/redirect', [SpotifyController::class, 'redirect'])->name('redirect');
        Route::get('/oauth/spotify/callback', [SpotifyController::class, 'callback'])->name('callback');
    });

    Route::name('knox.')->group(function () {
        Route::get('/oauth/knox/redirect', [KnoxController::class, 'redirect'])->name('redirect');
        Route::get('/oauth/knox/callback', [KnoxController::class, 'callback'])->name('callback');
    });
});
