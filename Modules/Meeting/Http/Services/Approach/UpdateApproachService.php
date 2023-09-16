<?php
namespace Modules\Meeting\Http\Services\Approach;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Approach;
use Modules\Meeting\Http\Requests\Approach\UpdateApproachRequest;

class UpdateApproachService
{
  
    static public function execute(UpdateApproachRequest $request, Approach $approach): JsonResponse
    {     
        
        $approach->meeting_id = $request->meeting_id;
        $approach->approach = $request->approach;
        $approach->speaker = $request->speaker;
        $approach->observation = $request->observation;

        $approach->save();        

        return response()->json([
            'message' => 'Approach updated'            
        ], 200);
    }

}
