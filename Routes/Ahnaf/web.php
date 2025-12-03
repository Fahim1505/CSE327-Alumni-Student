<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/student-dashboard/{id}/edit", [StudentsController::class, 'editview']);
Route::post("/student-dashboard/{id}/update", [StudentsController::class, 'updateprofile']);

Route::get("/student-dashboard/alumni", [StudentsController::class, 'all_alumni']);

// NEW: Donation route
Route::post('/student-dashboard/{id}/donate', [StudentsController::class, 'storeDonation'])
    ->name('student.donate');
