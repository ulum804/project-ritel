<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;


// AUTH & PUBLIC
Route::get('/', fn () => view('login.login'));

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');


// Staff
Route::middleware('auth.check')->group(function () {

    Route::get('/staff/dashboard', fn () => view('staff.dashboard'));

    Route::get('/staff/utama', [KeluarController::class, 'create'])->name('staff.utama');
    Route::get('/staff/cabang2', [KeluarController::class, 'create'])->name('staff.cabang2');
    Route::get('/staff/cabang3', [KeluarController::class, 'create'])->name('staff.cabang3');
    Route::get('/staff/reject', [KeluarController::class, 'create'])->name('staff.reject');

    Route::post('/staff/barang-masuk', [MasukController::class, 'store'])
        ->name('barang.masuk.store');

    Route::post('/staff/barang-keluar', [KeluarController::class, 'store'])
        ->name('barang.keluar.store');
});


// Staff Gudang
Route::middleware('auth.check')->prefix('kepala')->group(function () {

    Route::get('/dashboard', fn () => view('kepala.dashboard'))
        ->name('kepala.dashboard');

    Route::get('/warehouse1', [MasukController::class, 'approval'])
        ->name('warehouse1');

    Route::get('/warehouse2', [KeluarController::class, 'warehouse2'])
    ->name('warehouse2');

    Route::get('/warehouse3', fn () => view('kepala.warehouse3'))
        ->name('warehouse3');

    Route::get('/warehouse4', fn () => view('kepala.warehouse4'))
        ->name('warehouse4');
});


// kepala Gudang
Route::middleware('auth.check')->group(function () {

    Route::get('/barang-masuk/approval', [MasukController::class, 'approval'])
        ->name('masuk.approval');
    Route::put('/barang-masuk/{id}/setuju', [MasukController::class, 'approve'])
        ->name('masuk.approve');
    Route::put('/barang-masuk/{id}/tolak', [MasukController::class, 'reject'])
        ->name('masuk.reject');
    Route::get('/barang-keluar/approval', [KeluarController::class, 'list'])
        ->name('keluar.approval');
    Route::put('/barang-keluar/{id}/setuju', [KeluarController::class, 'approve'])
        ->name('keluar.approve');
    Route::put('/barang-keluar/{id}/tolak', [KeluarController::class, 'reject'])
        ->name('keluar.reject');
});


// Admin
Route::middleware('auth.check')->prefix('admin')->group(function () {

    Route::get('/laporan', [AdminController::class, 'laporan'])
    ->name('admin.laporan');

    Route::get('/manajemen', [UserController::class, 'index'])
        ->name('admin.manajemen');

    Route::get('/stok', [AdminController::class, 'stok'])
        ->name('admin.stok');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])
        ->name('user.destroy');
});
