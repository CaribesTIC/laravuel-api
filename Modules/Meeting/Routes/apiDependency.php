<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\DependencyController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('dependencies')->group(function () {
        Route::get('/', [DependencyController::class, 'index']);
        Route::get('/{dependency}', [DependencyController::class, 'show']);
        Route::post('/', [DependencyController::class, 'store']);
        Route::put('/{dependency}', [DependencyController::class, 'update']);
        Route::delete('/{id}', [DependencyController::class,'destroy']);
    });
    Route::get('/dependencies-help', [DependencyController::class, 'help']);
});

