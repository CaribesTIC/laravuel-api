<?php

use Illuminate\Http\Request;
use Modules\Meeting\Http\Controllers\{
  AgreementController,
  ApproachController,
  AttendeController,
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
    Route::prefix('agreements')->group(function () {  
        Route::get('/{meetingId}', [AgreementController::class, 'getAllByMeeting']);
        Route::get('/{agreement}', [AgreementController::class, 'show']);
        Route::post('/', [AgreementController::class, 'store']);
        Route::put('/{agreement}', [AgreementController::class, 'update']);
        Route::delete('/{id}', [AgreementController::class,'destroy']);
    });

    Route::prefix('approaches')->group(function () {  
        Route::get('/{meetingId}', [ApproachController::class, 'getAllByMeeting']);
        Route::get('/{approach}', [ApproachController::class, 'show']);
        Route::post('/', [ApproachController::class, 'store']);
        Route::put('/{approach}', [ApproachController::class, 'update']);
        Route::delete('/{id}', [ApproachController::class,'destroy']);
    });

    Route::prefix('attendes')->group(function () {  
        Route::get('/{meetingId}', [AttendeController::class, 'getAllByMeeting']);
        Route::get('/{attende}', [AttendeController::class, 'show']);
        Route::post('/', [AttendeController::class, 'store']);
        Route::put('/{attende}', [AttendeController::class, 'update']);
        Route::delete('/{id}', [AttendeController::class,'destroy']);
    });
    
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
