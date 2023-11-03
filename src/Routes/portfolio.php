<?php

use Illuminate\Support\Facades\Route;
use MichaelBarrows\Portfolio\Http\Controllers\ContactController;
use MichaelBarrows\Portfolio\Http\Controllers\EducationController;
use MichaelBarrows\Portfolio\Http\Controllers\EmploymentController;
use MichaelBarrows\Portfolio\Http\Controllers\ProjectController;

Route::domain(config('portfolio.portfolio-api-domain', 'api.michaelbarrows.com'))->group(function () {
    Route::middleware('web')->group(function () {
        Route::redirect('/', 'https://michaelbarrows.dev');
        Route::get('/education', EducationController::class)->name('education.all');
        Route::get('/employment', [EmploymentController::class, 'index'])->name('employment.all');
        Route::get('/project', [ProjectController::class, 'index'])->name('project.all');
        Route::post('/contact', ContactController::class)->name('contact.save');
    });

    // Route::middleware('auth:sanctum')->prefix('/internal')->name('internal.')->group(function () {
    //     Route::get('regenerate-token', RegenerateTokenController::class)->name('regenerate-token');

    //     Route::prefix('/employment')->name('employment.')->group(function () {
    //         Route::post('create', [EmploymentController::class, 'create'])->name('create');
    //         Route::post('{employment}', [EmploymentController::class, 'update'])->name('update');
    //         Route::delete('{employment}', [EmploymentController::class, 'delete'])->name('delete');
    //     });

    //     Route::prefix('/education')->name('education.')->group(function () {
    //         Route::post('create', [EducationController::class, 'create'])->name('create');
    //         Route::post('{education}', [EducationController::class, 'update'])->name('update');
    //         Route::delete('{education}', [EducationController::class, 'delete'])->name('delete');
    //     });
    // });
});
