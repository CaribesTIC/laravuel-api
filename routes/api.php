<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\XserController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;

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

Route::post('/sanctum/token', TokenController::class);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/users/auth', AuthController::class);
  Route::get('/users/{user}', [UserController::class, 'show']);
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/xsers', [XserController::class, 'index']);
  Route::post('/users', [UserController::class, 'store']);
  Route::post('/users/{user}', [UserController::class, 'update']);
  Route::get('/user/helperTables', function () {
      return response()->json([
        "roles" => [
          ["id"=> 1, "name" => "Admin"],
          ["id"=> 2, "name" => "User"],
          ["id"=> 3, "name" => "Other"]
        ]
      ], 200);
    });
  Route::post('/users/auth/avatar', [AvatarController::class, 'store']);

  Route::post('/messages', [MessageController::class, 'store']);
  Route::get('/messages', [MessageController::class, 'index']);
  
  Route::get('/products', [ProductController::class, 'index']);//->name('products.index');
   
  /*Route::prefix('roles')->group(function () {
    Route::get('/', function () {
      return response()->json([
        ["id"=> 1, "name" => "Admin"],
        ["id"=> 2, "name" => "User"],
        ["id"=> 3, "name" => "Other"]
      ], 200);
    });
    Route::get('/', [RoleController::class, 'index'])->name('roles');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/{role}/show', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');  
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');  
    Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{id}', [RoleController::class,'destroy'])->name('roles.destroy');
  });*/
  
  
  
});


