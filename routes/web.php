<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('warehouse.warehouse-1');
});
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

