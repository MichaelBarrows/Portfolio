<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/project/{pretty_url}', [ProjectController::class, 'show'])->name('project.show');
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Route::get('/images/{image}', [ImagesController::class, 'show'])->name('image.show');

Route::fallback(fn () => redirect()->away('https://github.com/MichaelBarrows'));
