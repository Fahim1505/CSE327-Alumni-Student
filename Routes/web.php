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
