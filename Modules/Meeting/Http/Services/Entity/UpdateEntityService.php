<?php
namespace Modules\Meeting\Http\Services\Entity;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Entity\UpdateEntityRequest;
use Modules\Meeting\Entities\Entity;

class UpdateEntityService
{
    static public function execute(UpdateEntityRequest $request, Entity $entity): JsonResponse
    {          
        // $entity = Entity::find($request->id);

        $entity->name = $request->name;
        
        $entity->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

