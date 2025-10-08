<?php

use App\Http\Controllers\ChuyenBayController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\VeController;



Route::get('/', function () {
    return redirect()->route('chuyen-bay.index');
});

Route::post('/test-form', function() {
    return 'Form đã gửi thành công!';
});


// resource routes với param name rõ ràng để route-model-binding hoạt động
Route::resource('chuyen-bay', ChuyenBayController::class)
    ->parameters(['chuyen-bay' => 'chuyen_bay']);
Route::resource('khach-hang', KhachHangController::class)
    ->parameters(['khach-hang' => 'khach_hang']);
Route::resource('ve', VeController::class)
    ->parameters(['ve' => 've']);

// route names sẽ là chuyen-bay.index, chuyen-bay.create, chuyen-bay.store, … 
// và controller sẽ nhận tham số kiểu ChuyenBay $chuyen_bay.