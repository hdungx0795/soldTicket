<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChuyenBayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Các route trong file này sẽ tự động có prefix là "api/".
| Ví dụ: route('chuyen-bay.index') -> /api/chuyen-bay
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('chuyen-bay', ChuyenBayController::class);
