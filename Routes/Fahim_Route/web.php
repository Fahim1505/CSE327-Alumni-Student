<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;

// Redirect home route to profile page
Route::get('/', function () {
    return redirect()->route('profile.show');
});

// Profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Donation routes
Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
Route::get('/donation/create', [DonationController::class, 'create'])->name('donation.create');
Route::post('/donation', [DonationController::class, 'store'])->name('donation.store');
