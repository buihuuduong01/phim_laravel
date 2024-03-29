<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

// Admin
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

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

Route::get('/',[IndexController::class,'home'])->name('homepage');
Route::get('/danh-muc/{slug}',[IndexController::class,'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class,'country'])->name('country');
Route::get('/phim/{slug}',[IndexController::class,'movie'])->name('movie');
Route::get('/xem-phim',[IndexController::class,'watch'])->name('watch');
Route::get('/episode',[IndexController::class,'episode'])->name('episode');
Route::get('/nam/{year}',[IndexController::class,'year']);
Route::get('/tag/{tag}',[IndexController::class,'tag']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('/movie', MovieController::class);
Route::post('/update-year-phim',[MovieController::class,'update_year']);
Route::get('/update-topview-phim',[MovieController::class,'update_topview']);
Route::post('/filter-topview-phim',[MovieController::class,'filter_topview']);
Route::get('/filter-topview-default',[MovieController::class,'filter_default']);
Route::post('/update-season-phim',[MovieController::class,'update_season']);

//sortable
Route::post('resorting',[ CategoryController::class,'resorting'])->name('resorting');
Route::post('resorting',[ GenreController::class,'resorting'])->name('resorting');
Route::post('resorting',[ CountryController::class,'resorting'])->name('resorting');

