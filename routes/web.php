<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

// index
Route::get('/', [MainController::class, 'home'])
    ->name('home');

