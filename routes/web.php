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

// Route::get('/kepala/dashboard', function () {
//     return view('kepala.dashboard');
// })->middleware('auth.check');
//     return view('warehouse.warehouse-1');
// });
Route::get('/kepala', function () {
    return view('warehouse.kepala-gudang');
});
Route::get('/warehouse-1', function () {
    return view('warehouse.warehouse-1');
})->name('warehouse.1');

Route::get('/warehouse-2', function () {
    return view('warehouse.warehouse-2');
})->name('warehouse.2');

Route::get('/warehouse-3', function () {
    return view('warehouse.warehouse-3');
})->name('warehouse.3');

Route::get('/warehouse-4', function () {
    return view('warehouse.warehouse-4');
})->name('warehouse.4');
