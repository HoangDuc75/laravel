<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');
    
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');
    
    Route::post('/add', function () {
        return redirect()->route('product.index')->with('success', 'Đã thêm sản phẩm thành công!');
    })->name('product.store');
    
    Route::get('/{id}', function ($id) {
        return view('product.detail', ['id' => $id]);
    })->name('product.detail');
});