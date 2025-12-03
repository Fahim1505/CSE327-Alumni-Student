<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\StudentAchievementsController;

// Photo Gallery
Route::get('/gallery', [PhotoGalleryController::class, 'index']);
Route::get('/gallery/create', [PhotoGalleryController::class, 'create']);
Route::post('/gallery', [PhotoGalleryController::class, 'store']);           // Corrected POST route
Route::delete('/gallery/{id}', [PhotoGalleryController::class, 'delete']);   // Corrected DELETE route

// Redirect root
Route::redirect('/', '/achievements');

// Student Achievements
Route::get('/achievements', [StudentAchievementsController::class, 'index'])->name('achievements.index');
Route::get('/achievements/create', [StudentAchievementsController::class, 'create'])->name('achievements.create');
Route::post('/achievements', [StudentAchievementsController::class, 'store'])->name('achievements.store');
Route::get('/achievements/{id}/edit', [StudentAchievementsController::class, 'edit'])->name('achievements.edit');
Route::put('/achievements/{id}', [StudentAchievementsController::class, 'update'])->name('achievements.update');
Route::delete('/achievements/{id}', [StudentAchievementsController::class, 'destroy'])->name('achievements.destroy');
