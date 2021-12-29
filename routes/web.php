<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::resource('/project', ProjectController::class)->only(['show']);
// Route::resource('/contact', ContactController::class)->only(['store']);
// Route::resource('/images', ImagesController::class)->only(['show']);

Route::fallback(fn () => redirect()->away('https://github.com/MichaelBarrows'));
