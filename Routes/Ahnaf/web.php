<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentDonationsController;

Route::get("/", function () {
    return view("welcome");
});
// Routes for Student Profile
Route::get("/student-dashboard/{id}/edit", [StudentsController::class, 'editview']);
Route::post("/student-dashboard/{id}/update", [StudentsController::class, 'updateprofile']);
Route::get("/student-dashboard/alumni", [StudentsController::class, 'all_alumni']);

// Routes for Student Donations
Route::get('/student-donations', [StudentDonationController::class, 'index'])->name('student-donations.index');
Route::get('/student-donations/create', [StudentDonationsController::class, 'create'])->name('student-donations.create');
Route::post('/student-donations', [StudentDonationsController::class, 'store']) ->name('student-donations.store');
Route::get('/student-donations/{id}/edit', [StudentDonationsController::class, 'edit'])->name('student-donations.edit');
Route::put('/student-donations/{id}', [StudentDonationsController::class, 'update']) ->name('student-donations.update');
Route::delete('/student-donations/{id}', [StudentDonationsController::class, 'destroy'])->name('student-donations.destroy');