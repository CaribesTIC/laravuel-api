<?php
namespace App\Http\Services\Role;

//use App\Http\Validator\Role\StoreRoleValidator;
//use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Http\{
    Request,
    JsonResponse
};
use App\Models\Role;

class StoreRoleService
{

  //static public function execute(StoreRoleRequest $request): \Illuminate\Http\JsonResponse
  static public function execute(Request $request): JsonResponse
  { 

      $msg  = 'Invalid data.';

      //if ( !StoreRoleValidator::rule( $request )->fails() ) {

          Role::create([              
              "name" => $request->name,
              "menu_ids" => $request->menu_ids,
              "description" => $request->description         
          ]);         

          $msg  = 'Role stored.';

      //}

      return response()->json(["message"=> $msg], 201);

  }

}
