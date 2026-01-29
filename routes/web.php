<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckTimeAccess;

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

// Product Routes
Route::prefix('product')->middleware(CheckTimeAccess::class)->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');
    
    Route::post('/add', function () {
        return redirect()->route('product.index')->with('success', 'Đã thêm sản phẩm thành công!');
    })->name('product.store');
    
    Route::get('/{id?}', function ($id = '123') {
        return view('product.detail', ['id' => $id]);
    })->name('product.detail');

    Route::get('/detail/{id?}', [ProductController::class, 'getDetail'])->name('product.detail');
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
