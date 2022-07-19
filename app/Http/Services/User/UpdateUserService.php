<?php
namespace App\Http\Services\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;


class UpdateUserService
{
    static public function execute(UpdateUserRequest $request, User $user) : JsonResponse
    {
        $data = $request->all();

        if (isset($data["password"]) && $data["password"]) {
            $data["password"] = Hash::make($data["password"]);
        } else {
            unset($data["password"]);
        }
            
        $user->update($data);

        return response()->json(["message"=> "Usuario actualizado"], 200);      
    }
}
