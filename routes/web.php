<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'home']);
Route::get('profile', [\App\Http\Controllers\MainController::class, 'profile']);
Route::get('project', [\App\Http\Controllers\ProjectController::class, 'project']);
Route::get('add', [\App\Http\Controllers\SerialsController::class, 'serials']);
Route::post('add', [\App\Http\Controllers\SerialsController::class, 'store'])->name('add');
Route::post('update', [\App\Http\Controllers\SerialsController::class, 'update']);
Route::post('genres', [\App\Http\Controllers\GenresController::class, 'getGenres']);
Route::post('countries', [\App\Http\Controllers\CountriesController::class, 'getCountries']);