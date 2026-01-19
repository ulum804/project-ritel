<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login.login');
});
Route::get('/register', function () {
    return view('login.registrasi');
});
Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
});
Route::get('/kepala/dashboard', function () {
    return view('kepala.dashboard');
});
Route::get('/kepala/dashboard', function () {
    return view('kepala.dashboard');
});
Route::get('/kepala/wire1', function () {
    return view('kepala.wire1');
});
Route::get('/kepala/wire2', function () {
    return view('kepala.wire2');
});
Route::get('/kepala/wire3', function () {
    return view('kepala.wire3');
});
Route::get('/kepala/wire4', function () {
    return view('kepala.wire4');
});

Route::get('/register', [UserController::class, 'create'])
    ->name('register');

Route::post('/register', [UserController::class, 'store'])
    ->name('register.store');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route dashboard contoh
Route::get('staff/dashboard', function() {
    return view('staff.dashboard');
})->middleware('auth.check'); // nanti bisa buat middleware auth

Route::get('/kepala/dashboard', function () {
    return view('kepala.dashboard');
})->middleware('auth.check');