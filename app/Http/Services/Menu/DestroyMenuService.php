<?php
namespace App\Http\Services\Menu;

use App\Http\Requests\Menu\DestroyMenuRequest;
use App\Models\Menu;

class DestroyMenuService
{
 
  static public function execute(DestroyMenuRequest $request): \Illuminate\Http\JsonResponse
  { 

      $menu = Menu::findOrFail($request->id);
      $menu->delete();      
            
      return response()->json(204);

  }
    
}
