<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Route for the welcome page
Route::get('/', function () {
    return redirect()->route('login.form');
});
// Route for displaying the registration form
Route::get('/register', function () {
    return view('Auth.register');
})->name('register.form');


Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Logged out successfully!');
    })->name('logout');
});
// Route for handling the registration form submission
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route for displaying the login form
Route::get('/login', function () {
    return view('Auth.login');
})->name('login.form');

// Route for handling the login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login');

