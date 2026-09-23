<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiPostController;

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::get('/posts', [ApiPostController::class, 'index']);
Route::get('/posts/{id}', [ApiPostController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/posts', [ApiPostController::class, 'store']);
    Route::put('/posts/{id}', [ApiPostController::class, 'update']);
    Route::delete('/posts/{id}', [ApiPostController::class, 'destroy']);
});
