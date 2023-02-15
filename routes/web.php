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
