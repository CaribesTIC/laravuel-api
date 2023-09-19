<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\EntityController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('entities')->group(function () {
        Route::get('/', [EntityController::class, 'index']);
        Route::get('/{entity}', [EntityController::class, 'show']);
        Route::post('/', [EntityController::class, 'store']);
        Route::put('/{entity}', [EntityController::class, 'update']);
        Route::delete('/{id}', [EntityController::class,'destroy']);
    });
    Route::get('/entities-help', [EntityController::class, 'help']);
});

