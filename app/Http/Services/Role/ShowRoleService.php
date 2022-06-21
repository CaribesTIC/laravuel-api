<?php
namespace App\Http\Services\Role;

use App\Models\Role;
use App\Repositories\Menu\{
    ListMenuRepository,
    RecursiveMenuRepository
};
use Illuminate\Http\JsonResponse;

class ShowRoleService
{

  static public function execute(Role $role): JsonResponse
  {
       $menus = ListMenuRepository::list(
              RecursiveMenuRepository::recursive()
       );

       return response()->json([
	       "role"  => (object)$role->toArray(), 
           "menus" => $menus,
       ]);
  }

}
