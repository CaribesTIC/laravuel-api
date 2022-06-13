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
        Route::get('/auth-menu', function () {
            return response()->json([
                [
                    "id" => 1,
                    "title" => "Dashboard",
                    "menu_id" => 0,
                    "path" => "dashboard",
                    "sort" => 1,
                    "icon" =>  "dashboard.svg",
                    "children_menus" => []
                ], [
                    "id" => 2,
                    "title" => "Message",
                    "menu_id" => 0,
                    "path" => "message",
                    "sort" => 2,
                    "icon" =>  "tasks.svg",
                    "children_menus" => []
                ], [
                    "id" => 3,
                    "title" => "ShopCart",
                    "menu_id" => 0,
                    "path" => "shopcart",
                    "sort" => 3,
                    "icon" =>  "journals.svg",
                    "children_menus" => []
                ], [
                    "id" => 4,
                    "title" => "Registrar",
                    "menu_id" => 0,
                    "path" => "#",
                    "icon" => "printer",
                    "sort" => 1,
                    "icon" =>  "",
                    "children_menus" =>  [
                        [
                            "id" => 5,
                            "title" => "Users",
                            "menu_id" => 4,
                            "path" => "users",
                            "sort" => 1,
                            "icon" =>  "users.svg",
                            "children_menus" => []
                        ]/*, [
                            "id" => 6,
                            "title" => "Clientes",
                            "menu_id" => 4,
                            "path" => "clients",
                            "sort" => 2,
                            "icon" =>  "zones.svg",
                            "children_menus" => []
                        ], [
                            "id" => 6,
                            "title" => "Minutes",
                            "menu_id" => 4,
                            "path" => "minutes",
                            "sort" => 3,
                            "icon" =>  "posts.svg",
                            "children_menus" => []
                        ]*/
                    ]
                ], [
                    "id" => 7,
                    "title" => "Themes",
                    "menu_id" => 0,
                    "path" => "#",
                    "icon" => "users",
                    "sort" => 2,
                    "icon" =>  "",
                    "children_menus" => [
                        [
                            "id" => 8,
                            "title" => "UI Elements",
                            "menu_id" => 7,
                            "path" => "ui-elements",
                            "sort" => 1,
                            "icon" =>  "categories.svg",
                            "children_menus" => []
                        ], [
                            "id" => 9,
                            "title" => "Tables",
                            "menu_id" => 7,
                            "path" => "tables",
                            "sort" => 2,
                            "icon" =>  "dwelling-types.svg",
                            "children_menus" => []
                        ], [
                            "id" => 10,
                            "title" => "Forms",
                            "menu_id" => 7,
                            "path" => "forms",
                            "sort" => 3,
                            "icon" =>  "dashboard.svg",
                            "children_menus" => []
                        ], [
                            "id" => 10,
                            "title" => "Card",
                            "menu_id" => 7,
                            "path" => "card",
                            "sort" => 4,
                            "icon" =>  "zones.svg",
                            "children_menus" => []
                        ], [
                            "id" => 11,
                            "title" => "Modal",
                            "menu_id" => 7,
                            "path" => "modal",
                            "sort" => 5,
                            "icon" =>  "posts.svg",
                            "children_menus" => []
                        ], [
                            "id" => 12,
                            "title" => "Blank",
                            "menu_id" => 7,
                            "path" => "blank",
                            "sort" => 6,
                            "icon" =>  "journals.svg",
                            "children_menus" => []
                        ]
                    ]
                ]/*, [
                    "id" => 3,
                    "title" => "Development",
                    "menu_id" => 0,
                    "path" => "#",
                    "icon" => "office",
                    "sort" => 3,
                    "icon" =>  "apple",
                    "children_menus" => [
                        [
                            "id" => 11,
                            "title" => "Menus",
                            "menu_id" => 3,
                            "path" => "posts.index",
                            "sort" => 1,
                            "icon" =>  "menus.svg",
                            "children_menus" => []
                        ], [
                            "id" => 12,
                            "title" => "Roles",
                            "menu_id" => 3,
                            "path" => "posts.index",
                            "sort" => 2,
                            "icon" =>  "users.svg",
                            "children_menus" => []
                        ]
                    ]
                ]*/
            ]);   
        });    
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
