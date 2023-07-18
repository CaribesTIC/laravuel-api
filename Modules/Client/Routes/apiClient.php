<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/{client}', [ClientController::class, 'show']);
        Route::post('/', [ClientController::class, 'store']);
        Route::put('/{client}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class,'destroy']);
    });
    Route::get('/clients-help', [ClientController::class, 'help']);
});

