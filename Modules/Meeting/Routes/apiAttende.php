<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\AttendeController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('attendes')->group(function () {  
        Route::get('/{meetingId}', [AttendeController::class, 'getAllByMeeting']);
        Route::get('/{attende}', [AttendeController::class, 'show']);
        Route::post('/', [AttendeController::class, 'store']);
        Route::put('/{attende}', [AttendeController::class, 'update']);
        Route::delete('/{id}', [AttendeController::class,'destroy']);
    });
});
