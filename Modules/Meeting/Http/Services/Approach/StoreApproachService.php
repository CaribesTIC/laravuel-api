<?php
namespace Modules\Meeting\Http\Services\Approach;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Approach;
use Modules\Meeting\Http\Requests\Approach\StoreApproachRequest;

class StoreApproachService
{
  
    static public function execute(StoreApproachRequest $request): JsonResponse
    {     
        $approach = new Approach();
        
        $approach->meeting_id = $request->meeting_id;
        $approach->approach = $request->approach;
        $approach->speaker = $request->speaker;
        $approach->observation = $request->observation;

        $approach->save();
        $approach->refresh();

        return response()->json([
            'message' => 'Approach created',
            'approach_id' => $approach->id
        ], 201);
    }

}
