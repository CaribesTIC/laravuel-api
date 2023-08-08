<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Meeting\Http\Controllers\MeetingController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('meetings')->group(function () {
        Route::get('/', [MeetingController::class, 'index']);
        Route::get('/{meeting}', [MeetingController::class, 'show']);
        Route::post('/', [MeetingController::class, 'store']);
        Route::put('/{meeting}', [MeetingController::class, 'update']);
        Route::delete('/{id}', [MeetingController::class,'destroy']);
    });
    Route::get('/meetings-help', [MeetingController::class, 'help']);
});

