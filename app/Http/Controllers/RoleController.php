<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Services\Role\{
    IndexRoleService,
    ShowRoleService,
    StoreRoleService,    
    UpdateRoleService,
    DestroyRoleService    
};
use Illuminate\Http\{
    Request,
    JsonResponse
};

class RoleController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        return IndexRoleService::execute($request);
    }

    public function show(Role $role): JsonResponse
    {
        return ShowRoleService::execute($role); 
    } 

    public function store(Request $request): JsonResponse
    {
        return StoreRoleService::execute($request);
    }

    public function update(Request $request, Role $role): JsonResponse
    {
        return UpdateRoleService::execute($request, $role);
    }

    public function destroy(Request $request): JsonResponse
    {
        return DestroyRoleService::execute($request);
    }

}
