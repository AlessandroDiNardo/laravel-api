<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

// index
Route::get('/', [MainController::class, 'home'])
    ->name('home');

// show
Route::get('/movies', [MainController::class, 'movies'])
->name('movies');

// delete
Route::get('/delete/movie/{movie}', [MainController::class, 'delete'])
    ->name('delete.movie');

// create
Route::get('/create/movie', [MainController::class, 'create'])
->name('create.movie');
Route::post('/store/movie', [MainController::class, 'store'])
->name('store.movie');
