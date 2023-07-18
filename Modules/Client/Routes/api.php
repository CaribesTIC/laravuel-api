<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;
use Modules\Client\Http\Controllers\CountryController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/{client}', [ClientController::class, 'show']);
        Route::post('/', [ClientController::class, 'store']);
        Route::put('/{client}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class,'destroy']);
    });
    Route::get('/clients-help', [ClientController::class, 'help']);
    Route::prefix('countries')->group(function () {
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
        Route::post('/', [CountryController::class, 'store']);
        Route::put('/{country}', [CountryController::class, 'update']);
        Route::delete('/{id}', [CountryController::class,'destroy']);
    });
    Route::get('/countries-help', [CountryController::class, 'help']);
});
