<?php
namespace App\Http\Services\Role;

//use Illuminate\Support\Facades\Redirect;
//use App\Http\Validator\Role\UpdateStoreRoleValidator;
//use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Http\{
    Request,
    JsonResponse
};
use App\Models\Role;

class UpdateRoleService
{

  //static public function execute(StoreRoleRequest $request): \Illuminate\Http\RedirectResponse
  static public function execute(Request $request, Role $role): JsonResponse
  { 

      $msg  = 'Invalid data.';
      //$code = 202;

      //if ( !UpdateMenuValidator::rule( $request )->fails() ) {
          $role->update( $request->except( '_method', 'id' ) );
          $msg  = 'Role updated.';          
          //$code = 200;          
      //}
      
      return response()->json(["message"=> $msg], 200);

  }

}


