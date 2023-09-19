<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\PositionController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('positions')->group(function () {
        Route::get('/', [PositionController::class, 'index']);
        Route::get('/{position}', [PositionController::class, 'show']);
        Route::post('/', [PositionController::class, 'store']);
        Route::put('/{position}', [PositionController::class, 'update']);
        Route::delete('/{id}', [PositionController::class,'destroy']);
    });
    Route::get('/positions-help', [PositionController::class, 'help']);
});

