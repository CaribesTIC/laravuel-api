<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthMenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
|
| Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
|     return $request->user();
| });
|
*/

Route::post('/sanctum/token', TokenController::class);
Route::middleware(['auth:sanctum'])->group(function () {
    //Route::prefix('users')->middleware(['role:admin'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/auth', AuthController::class);
        Route::get('/auth-menu', AuthMenuController::class);
        Route::get('/{user}', [UserController::class, 'show']);        
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::post('/{user}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class,'destroy']);
        Route::post('/auth/avatar', [AvatarController::class, 'store']);
    });
       
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::get('/children/{menuId}', [MenuController::class, 'children']);
        Route::post('/', [MenuController::class, 'store']);  
        Route::put('/{menu}', [MenuController::class, 'update']);
        Route::delete('/{id}', [MenuController::class,'destroy']);
    });

    Route::post('/messages', [MessageController::class, 'store']);
    Route::get('/messages', [MessageController::class, 'index']);
  
    Route::get('/products', [ProductController::class, 'index']);//->name('products.index');
   
    Route::prefix('roles')->group(function () {
        Route::get('/helperTables', fn() => response()->json([
            "roles" => \App\Models\Role::get()
        ], 200));
        Route::get('/{role}', [RoleController::class, 'show']);
        Route::get('/', [RoleController::class, 'index']);       
        Route::post('/', [RoleController::class, 'store']);  
        Route::put('/{role}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class,'destroy']);        
    });   
    
});
