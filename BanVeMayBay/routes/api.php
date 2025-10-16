<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChuyenBayController;
use App\Http\Controllers\Api\KhachHangController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('chuyen-bay', ChuyenBayController::class);

Route::apiResource('khach-hang', KhachHangController::class);
