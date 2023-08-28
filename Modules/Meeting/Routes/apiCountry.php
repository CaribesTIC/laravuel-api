<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\CountryController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('countries')->group(function () {
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
        Route::post('/', [CountryController::class, 'store']);
        Route::put('/{country}', [CountryController::class, 'update']);
        Route::delete('/{id}', [CountryController::class,'destroy']);
    });
    Route::get('/countries-help', [CountryController::class, 'help']);
});

