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

// тестовые
Route::get('/', [\App\Http\Controllers\MainController::class, 'home']);
Route::get('profile', [\App\Http\Controllers\MainController::class, 'profile']);
Route::get('project', [\App\Http\Controllers\ProjectController::class, 'project']);
// сериалы
Route::get('addSerial', [\App\Http\Controllers\SerialsController::class, 'serials']);
Route::post('addSerial', [\App\Http\Controllers\SerialsController::class, 'store'])->name('addSerial');
Route::post('update', [\App\Http\Controllers\SerialsController::class, 'update']);
Route::post('genres', [\App\Http\Controllers\GenresController::class, 'getGenres']);
Route::post('countries', [\App\Http\Controllers\CountriesController::class, 'getCountries']);
Route::post('deleteSerial', [\App\Http\Controllers\SerialsController::class, 'deleteSerial']);
// жанры
Route::get('addGenre', [\App\Http\Controllers\GenresController::class, 'renderGenres']);
Route::post('addGenre', [\App\Http\Controllers\GenresController::class, 'addGenres'])->name('addGenre');
Route::post('updateGenre', [\App\Http\Controllers\GenresController::class, 'updateGenre']);
Route::post('deleteGenre', [\App\Http\Controllers\GenresController::class, 'deleteGenre']);
//страны
Route::get('addCountry', [\App\Http\Controllers\CountriesController::class, 'renderCountries']);
Route::post('addCountry', [\App\Http\Controllers\CountriesController::class, 'addCountries'])->name('addCountry');
Route::post('updateCountry', [\App\Http\Controllers\CountriesController::class, 'updateCountry']);
Route::post('deleteCountry', [\App\Http\Controllers\CountriesController::class, 'deleteCountry']);