<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChuyenBayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Các route cần đăng nhập mới vào được
    Route::resource('chuyen-bay', ChuyenBayController::class)
        ->parameters(['chuyen-bay' => 'chuyen_bay']);
});

// Auth routes (đăng ký, đăng nhập, quên mật khẩu...)
require __DIR__.'/auth.php';
