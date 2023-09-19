<?php
namespace Modules\Meeting\Http\Services\Entity;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Entity\StoreEntityRequest;
use Modules\Meeting\Entities\Entity;

class StoreEntityService
{
    static public function execute(StoreEntityRequest $request): JsonResponse
    {
        $entity = new Entity;

        $entity->name = $request->name;
        
        $entity->save();

        $entity->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $entity->id
        ], 201);
  }

}