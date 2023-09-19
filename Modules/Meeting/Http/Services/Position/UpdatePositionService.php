<?php
namespace Modules\Meeting\Http\Services\Position;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Position\UpdatePositionRequest;
use Modules\Meeting\Entities\Position;

class UpdatePositionService
{
    static public function execute(UpdatePositionRequest $request, Position $position): JsonResponse
    {          
        // $position = Position::find($request->id);

        $position->name = $request->name;
        
        $position->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

