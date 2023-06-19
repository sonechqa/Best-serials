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

// главная страница
Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');
// тестовые
Route::get('project', [\App\Http\Controllers\ProjectController::class, 'project']);
// сериалы
Route::get('addSerial', [\App\Http\Controllers\SerialsController::class, 'serials']);
Route::post('addSerial', [\App\Http\Controllers\SerialsController::class, 'store'])->name('addSerial');
Route::post('update', [\App\Http\Controllers\SerialsController::class, 'update']);
Route::post('deleteSerial', [\App\Http\Controllers\SerialsController::class, 'deleteSerial']);
Route::get('serials/{id}', [\App\Http\Controllers\SerialsController::class, 'showSerialPage']);
Route::post('getSerial', [\App\Http\Controllers\SerialsController::class, 'getSerial']);
Route::get('search', [\App\Http\Controllers\SearchController::class, 'search']);
// жанры
Route::get('addGenre', [\App\Http\Controllers\GenresController::class, 'renderGenres']);
Route::post('addGenre', [\App\Http\Controllers\GenresController::class, 'addGenres'])->name('addGenre');
Route::post('updateGenre', [\App\Http\Controllers\GenresController::class, 'updateGenre']);
Route::post('deleteGenre', [\App\Http\Controllers\GenresController::class, 'deleteGenre']);
Route::post('genres', [\App\Http\Controllers\GenresController::class, 'getGenres']);
// страны
Route::get('addCountry', [\App\Http\Controllers\CountriesController::class, 'renderCountries']);
Route::post('addCountry', [\App\Http\Controllers\CountriesController::class, 'addCountries'])->name('addCountry');
Route::post('updateCountry', [\App\Http\Controllers\CountriesController::class, 'updateCountry']);
Route::post('deleteCountry', [\App\Http\Controllers\CountriesController::class, 'deleteCountry']);
Route::post('countries', [\App\Http\Controllers\CountriesController::class, 'getCountries']);
// вход и выход
Route::get('logIn', [\App\Http\Controllers\LogInController::class, 'renderLogIn']);
Route::post('logIn', [\App\Http\Controllers\LogInController::class, 'logInUser']);
Route::post('logout', [\App\Http\Controllers\LogInController::class, 'logout']);
// регистрация
Route::get('register', [\App\Http\Controllers\RegisterController::class, 'register']);
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'addUser'])->name('register');
// профиль пользователя
Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::post('updateProfile', [\App\Http\Controllers\ProfileController::class, 'updateProfile']);
Route::post('deleteProfile', [\App\Http\Controllers\ProfileController::class, 'deleteProfile']);
Route::post('deletePhoto', [\App\Http\Controllers\ProfileController::class, 'deletePhoto']);
// папки с сериалами
Route::get('addFolder', [\App\Http\Controllers\FoldersController::class, 'renderFolders'])->name('addFolder');
Route::post('addFolder', [\App\Http\Controllers\FoldersController::class, 'addFolders'])->name('addFolder');
Route::post('updateFolder', [\App\Http\Controllers\FoldersController::class, 'updateFolder']);
Route::post('deleteFolder', [\App\Http\Controllers\FoldersController::class, 'deleteFolder']);
Route::post('addSerialInFolder', [\App\Http\Controllers\FoldersController::class, 'addInFolder']);
Route::get('folders/{id}', [\App\Http\Controllers\FoldersController::class, 'renderOneFolder']);
// рейтинг сериалов
Route::post('rating', [\App\Http\Controllers\RatingsController::class, 'rateSerial']);