<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;

Route::get('/', function () {
    return view('welcome');
});

// Correct CRUD route for your 4 BLADE FILES
Route::resource('jobs', JobListingController::class);

use App\Http\Controllers\AchievementController;

Route::resource('achievements', AchievementController::class);

use App\Http\Controllers\AchievementController;

// Achievement CRUD routes
Route::resource('achievements', AchievementController::class);
