<?php

use Illuminate\Http\Request;
use Modules\Meeting\Http\Controllers\MeetingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/meeting', function (Request $request) {
//    return $request->user();
//});

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
