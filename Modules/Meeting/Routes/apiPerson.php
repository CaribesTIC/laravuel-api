<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\PersonController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('people')->group(function () {
        Route::get('/', [PersonController::class, 'index']);
        Route::get('/{person}', [PersonController::class, 'show']);
        Route::post('/', [PersonController::class, 'store']);
        Route::put('/{person}', [PersonController::class, 'update']);
        Route::delete('/{id}', [PersonController::class,'destroy']);
    });
    Route::get('/people-help', [PersonController::class, 'help']);
});

