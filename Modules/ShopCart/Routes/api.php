<?php

use Illuminate\Http\Request;

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

//Route::middleware(['auth:sanctum'])->get('/shopcart', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['auth:sanctum'])->group(function () {    
    Route::prefix('shopcart')->group(function () {
        Route::get('/', function (Request $request) {
            $products = [
                [
                    "name" => "Plain Ol' Pineapple",
                    "image" => "pineapple-original.jpg",
                    "price" => 4
                ], [
                    "name" => "Dried Pineapple",
                    "image" => "pineapple-dried.jpg",
                    "price" => 5
                ], [
                    "name" => "Pineapple Gum",
                    "image" => "pineapple-gum.jpg",
                    "price" => 3
                ], [
                    "name" => "Pineapple T-Shirt",
                    "image" => "pineapple-tshirt.jpg",
                    "price" => 12
                ]
            ];        

            return json_encode($products, 200);
        });
    });
});
