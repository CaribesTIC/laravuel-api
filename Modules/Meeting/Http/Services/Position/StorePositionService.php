<?php
namespace Modules\Meeting\Http\Services\Position;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Position\StorePositionRequest;
use Modules\Meeting\Entities\Position;

class StorePositionService
{
    static public function execute(StorePositionRequest $request): JsonResponse
    {
        $position = new Position;

        $position->name = $request->name;
        
        $position->save();

        $position->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $position->id
        ], 201);
  }

}