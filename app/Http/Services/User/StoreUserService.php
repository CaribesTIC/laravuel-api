<?php
namespace App\Http\Services\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class StoreUserService
{
  
    static public function execute(Request $request): \Illuminate\Http\JsonResponse
    {        
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
     
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return response()->json(["message"=> "Usuario creado"], 201);
        //return  response()->json(["message" => "Forbidden"], 403);
    }

}
