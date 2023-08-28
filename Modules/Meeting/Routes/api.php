<?php

use Illuminate\Http\Request;
use Modules\Meeting\Http\Controllers\{
  CountryController,
  MeetingController,
  PersonController
};


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
    Route::prefix('countries')->group(function () {
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
        Route::post('/', [CountryController::class, 'store']);
        Route::put('/{country}', [CountryController::class, 'update']);
        Route::delete('/{id}', [CountryController::class,'destroy']);
    });
    Route::get('/countries-help', [CountryController::class, 'help']);

    Route::prefix('meetings')->group(function () {
        Route::get('/', [MeetingController::class, 'index']);
        Route::get('/{meeting}', [MeetingController::class, 'show']);
        Route::post('/', [MeetingController::class, 'store']);
        Route::put('/{meeting}', [MeetingController::class, 'update']);
        Route::delete('/{id}', [MeetingController::class,'destroy']);
    });
    Route::get('/meetings-help', [MeetingController::class, 'help']);

    Route::prefix('people')->group(function () {
        Route::get('/', [PersonController::class, 'index']);
        Route::get('/{person}', [PersonController::class, 'show']);
        Route::post('/', [PersonController::class, 'store']);
        Route::put('/{person}', [PersonController::class, 'update']);
        Route::delete('/{id}', [PersonController::class,'destroy']);
    });
    Route::get('/people-help', [PersonController::class, 'help']);
});
