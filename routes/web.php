<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AgeController;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAge;

Route::get('/', function () {
    return view('home');
})->name('home');

// Login Routes
Route::prefix('auth')->group(function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

    Route::post('/register', [UserController::class, 'checkRegister'])->name('register.submit');
    
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

    Route::post('/login', [UserController::class, 'checkLogin'])->name('login.submit');
});

// Check age
Route::prefix('age')->controller(AgeController::class)->group(function () {
    Route::get('/form', 'showAgeForm')->name('age.form');
    
    Route::post('/verify', 'checkAge')->name('age.verify');
    
    Route::get('/success', 'successAge')->middleware(CheckAge::class)->name('age.success');
});

// layouts
Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');

// Product Routes (resourceful)
Route::middleware(CheckTimeAccess::class)->group(function () {
    Route::resource('product', ProductController::class);
});

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Hoàng Văn Đức', $mssv = '0005067') {
    return view('sinhvien', [
        'name' => $name,
        'mssv' => $mssv
    ]);
})->name('sinhvien');

Route::get('/banco/{n?}', function ($n = 8) {
    $n = (int) $n;
    if ($n < 4) $n = 4;
    if ($n > 20) $n = 20;
    
    return view('banco', ['n' => $n]);
})->name('banco');

Route::fallback(function () {
    return view('error.404');
});
