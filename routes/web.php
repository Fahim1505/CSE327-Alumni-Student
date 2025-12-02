<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\AchievementController; // Only import once

Route::get('/', function () {
    return redirect('/jobs');
});

// Job CRUD routes
Route::resource('jobs', JobListingController::class);

// Achievement CRUD routes
Route::resource('achievements', AchievementController::class);
