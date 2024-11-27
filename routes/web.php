<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CountriesController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UsersController::class);
Route::resource('countries', CountriesController::class);
