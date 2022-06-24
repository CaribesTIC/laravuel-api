<?php

namespace App\Http\Controllers;

//use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Menu\RecursiveMenuRepository;

class AuthMenuController extends Controller
{
    public function __invoke()
    {
        if (!Auth::user())  //auth()->check()
            return  response()->json(["message" => "Forbidden"], 403);          

        $user = Auth::user();
        $role = \App\Models\Role::select('menu_ids')->find($user->role_id);           
        $menus = RecursiveMenuRepository::recursive($role->menu_ids);
        //$menus = RecursiveMenuRepository::recursive();               
        return response()->json($menus);       
       
    }
}
