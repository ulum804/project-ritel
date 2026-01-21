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
// Route::get('staff/dashboard', function () {
//     return view('staff.dashboard');
// })->middleware('auth.check'); // nanti bisa buat middleware auth

Route::get('/kepala/dashboard', function () {
    return view('kepala.dashboard');
})->middleware('auth.check')->name('kepala.dashboard');
Route::get('/kepala/warehouse1', function () {
    return view('kepala.warehouse1');
})->middleware('auth.check')->name('warehouse1');
Route::get('/kepala/warehouse2', function () {
    return view('kepala.warehouse2');
})->middleware('auth.check')->name('warehouse2');
Route::get('/kepala/warehouse3', function () {
    return view('kepala.warehouse3');
})->middleware('auth.check')->name('warehouse3');
Route::get('/kepala/warehouse4', function () {
    return view('kepala.warehouse4');
})->middleware('auth.check')->name('warehouse4');

// Route::get('/staff/utama', function () {
//     return view('staff.utama');
// })->middleware('auth.check')->name('utama');
// Route::get('/staff/cabang2', function () {
//     return view('staff.cabang2');
// })->middleware('auth.check')->name('cabang2');
// Route::get('/staff/staff3', function () {
//     return view('staff.staff3');
// })->middleware('auth.check')->name('staff3');
// Route::get('/staff/staff4', function () {
//     return view('staff.staff4');
// })->middleware('auth.check')->name('staff4');

// Route::get('/staff/utama', function () {
//     abort_if(session('user_gudang') != 4, 403);
//     return view('staff.utama');
// });
// Route::get('/staff/cabang1', function () {
//     abort_if(session('user_gudang') != 1, 403);
//     return view('staff.cabang1');
// });
// Route::get('/staff/cabang2', function () {
//     abort_if(session('user_gudang') != 2, 403);
//     return view('staff.utama');
// });
// Route::get('/staff/reject', function () {
//     abort_if(session('user_gudang') != 3, 403);
//     return view('staff.reject');
// });

Route::get('/staff/utama', function () {
    return view('staff.utama');
});

Route::get('/staff/cabang2', function () {
    return view('staff.cabang2');
});

Route::get('/staff/cabang3', function () {
    return view('staff.cabang3');
});

Route::get('/staff/reject', function () {
    return view('staff.reject');
});


// Route::get('/kepala', function () {
//     return view('kepala.warehouse1');
// });
// Route::get('/warehouse-1', function () {
//     return view('warehouse.warehouse-1');
// })->name('warehouse.1');

// Route::get('/warehouse-2', function () {
//     return view('warehouse.warehouse-2');
// })->name('warehouse.2');

// Route::get('/warehouse-3', function () {
//     return view('warehouse.warehouse-3');
// })->name('warehouse.3');

// Route::get('/warehouse-4', function () {
//     return view('warehouse.warehouse-4');
// })->name('warehouse.4');


// admin
Route::get('/admin/laporan', function () {
    return view('admin.laporan');
})->middleware('auth.check')->name('admin.laporan');
Route::get('/admin/manajemen', function () {
    return view('admin.manajemen');
})->middleware('auth.check')->name('admin.manajemen');
Route::get('/admin/stok', function () {
    return view('admin.stok');
})->middleware('auth.check')->name('admin.stok');



Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
