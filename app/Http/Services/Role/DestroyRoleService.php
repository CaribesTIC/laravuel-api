<?php
namespace App\Http\Services\Role;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use App\Models\Role;

class DestroyRoleService
{

  static public function execute(Request $request): \Illuminate\Http\JsonResponse
  { 

      //$msg  = 'Invalid argument.';
      $role = Role::findOrFail($request->id);
      $role->delete();
      //$msg  = 'Role remove.';

      return response()->json(204);

  }

}
