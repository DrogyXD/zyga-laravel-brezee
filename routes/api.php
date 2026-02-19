<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Públicas
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

    // Protegidas
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/me', function (Request $request) {
            return response()->json($request->user());
        });

        Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

        Route::post(
            '/assistance-requests',
            [\App\Http\Controllers\Api\AssistanceRequestController::class, 'store']
        );

    });

});
