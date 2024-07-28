<?php

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
    return view('welcome');
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/oauth/spotify/redirect', [SpotifyController::class, 'redirect']);
    Route::get('/oauth/spotify/callback', [SpotifyController::class, 'callback']);
});
