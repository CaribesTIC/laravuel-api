<?php
namespace App\Http\Services\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UpdateUserService
{
    static public function execute(Request $request, User $user) : \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        if (isset($data["password"]) && $data["password"] )
            $data["password"] = Hash::make($data["password"]);
        else
            unset($data["password"]); 
        $user->update($data);
        return response()->json(["message"=> "Usuario actualizado"], 200);
      
    }
}
