<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/{client}', [ClientController::class, 'show']);
    Route::post('/', [ClientController::class, 'store']);        
    Route::put('/{client}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class,'destroy']);        
});
