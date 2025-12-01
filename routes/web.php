<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});

// Job CRUD routes
Route::resource('jobs', JobController::class);
