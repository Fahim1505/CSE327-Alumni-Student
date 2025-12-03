use App\Http\Controllers\Auth\RegisterController;
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

use App\Http\Controllers\Auth\LoginController;
Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.check');

Route::get('/dashboard', function(){
    if(!session('user_id')) return redirect('/login');
    return view('dashboard');
});

Route::get('/logout', function(){
    session()->flush();
    return redirect('/login')->with('success', 'Logged out');
});

use App\Http\Controllers\EventController;

Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/events', [EventController::class, 'index'])->name('event.index');

// New Routes for Edit & Delete
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
Route::get('/event/{id}/delete', [EventController::class, 'destroy'])->name('event.delete');

use App\Http\Controllers\AnnouncementController;

Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::post('/announcement/{id}/update', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::get('/announcement/{id}/delete', [AnnouncementController::class, 'destroy'])->name('announcement.delete');


use App\Http\Controllers\EventController;
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/events', [EventController::class, 'index'])->name('event.index');
