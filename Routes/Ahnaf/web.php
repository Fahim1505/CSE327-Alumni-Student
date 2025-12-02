<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentDonationsController;

Route::get("/", function () {
    return view("welcome");
});
// Routes for Student Profile
Route::get("/student/profile/edit", [StudentsController::class, 'edit'])->name('student.profile.edit');;
Route::post("/student/profile/update", [StudentsController::class, 'update'])->name('student.profile.update');;

// Routes for Student Donations
Route::get('/student-donations', [StudentDonationController::class, 'index'])->name('student-donations.index');
Route::get('/student-donations/create', [StudentDonationsController::class, 'create'])->name('student-donations.create');
Route::post('/student-donations', [StudentDonationsController::class, 'store']) ->name('student-donations.store');
Route::get('/student-donations/{donation}/edit', [StudentDonationsController::class, 'edit'])->name('student-donations.edit');
Route::put('/student-donations/{donation}', [StudentDonationsController::class, 'update']) ->name('student-donations.update');
Route::delete('/student-donations/{donation}', [StudentDonationsController::class, 'destroy'])->name('student-donations.destroy');