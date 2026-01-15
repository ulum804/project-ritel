<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.login');
});
Route::get('/regis', function () {
    return view('login.registrasi');
});
Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
});
