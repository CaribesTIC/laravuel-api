<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\ApproachController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('approaches')->group(function () {  
        Route::get('/{meetingId}', [ApproachController::class, 'getAllByMeeting']);
        Route::get('/{approach}', [ApproachController::class, 'show']);
        Route::post('/', [ApproachController::class, 'store']);
        Route::put('/{approach}', [ApproachController::class, 'update']);
        Route::delete('/{id}', [ApproachController::class,'destroy']);
    });
});
