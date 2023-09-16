<?php
namespace Modules\Meeting\Http\Services\Attende;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Attende;
use Modules\Meeting\Http\Requests\Attende\UpdateAttendeRequest;

class UpdateAttendeService
{
  
    static public function execute(UpdateAttendeRequest $request, Attende $attende): JsonResponse
    {     
        
        $attende->meeting_id = $request->meeting_id;
        $attende->idcard = $request->idcard;
        $attende->fullname = $request->fullname;
        $attende->entity_id = $request->entity_id;
        $attende->dependence_id = $request->dependence_id;
        $attende->position_id = $request->position_id;
        $attende->email = $request->email;
        $attende->phone = $request->phone;
        $attende->observation = $request->observation;

        $attende->save();        

        return response()->json([
            'message' => 'Attende updated'            
        ], 200);
    }

}