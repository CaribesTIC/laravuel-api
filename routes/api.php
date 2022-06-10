<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;

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
        Route::get('/{user}', [UserController::class, 'show']);        
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::post('/{user}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class,'destroy']);
        Route::post('/auth/avatar', [AvatarController::class, 'store']);
    });

    Route::get('/roles/helperTables', function () {
        return response()->json([
            "roles" => [
                ["id"=> 1, "name" => "Admin"],
                ["id"=> 2, "name" => "User"],
                ["id"=> 3, "name" => "Other"]
            ]
        ], 200);
    });

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
