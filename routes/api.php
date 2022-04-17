<?php

use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\EmploymentController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/education/all', EducationController::class)->name('education.all');
Route::get('/employment/all', EmploymentController::class)->name('employment.all');
Route::get('/project/all', [ProjectController::class, 'index'])->name('project.all');
Route::get('/project/{project:pretty_url}', [ProjectController::class, 'show'])->name('project.show');
