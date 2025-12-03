<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get("/", function () {
  return view("welcome");
});

Route::get("/student-dashboard/{id}/edit", "StudentsController@editview");
Route::post(
  "/student-dashboard/{id}/update",
  "StudentsController@updateprofile",
);
Route::get("/student-dashboard/alumni", "StudentsController@all_alumni");
Route::get("/student-dashboard/donate", [
  StudentsController::class,
  "donate",
])->name("student.donate");
Route::post("/student-dashboard/donate", [
  StudentsController::class,
  "processDonation",
])->name("student.donate.process");

