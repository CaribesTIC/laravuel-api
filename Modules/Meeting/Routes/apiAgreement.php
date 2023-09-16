<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\AgreementController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('agreements')->group(function () {  
        Route::get('/{meetingId}', [AgreementController::class, 'getAllByMeeting']);
        Route::get('/{agreement}', [AgreementController::class, 'show']);
        Route::post('/', [AgreementController::class, 'store']);
        Route::put('/{agreement}', [AgreementController::class, 'update']);
        Route::delete('/{id}', [AgreementController::class,'destroy']);
    });
});
