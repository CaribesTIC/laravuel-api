<?php
namespace App\Http\Services\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;

class StoreUserService
{
  
    static public function execute(StoreUserRequest $request): \Illuminate\Http\JsonResponse
    {     
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return response()->json(["message"=> "Usuario creado"], 201);
    }

}
