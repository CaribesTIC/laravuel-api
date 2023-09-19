<?php
namespace Modules\Meeting\Http\Services\Attende;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Attende;
use Modules\Meeting\Http\Requests\Attende\StoreAttendeRequest;

class StoreAttendeService
{
  
    static public function execute(StoreAttendeRequest $request): JsonResponse
    {     
        $attende = new Attende();
        
        $attende->meeting_id = $request->meeting_id;
        $attende->idcard = $request->idcard;
        $attende->fullname = $request->fullname;
        $attende->email = $request->email;
        $attende->phone = $request->phone;
        $attende->observation = $request->observation;
        $attende->entity_id = $request->entity_id;
        $attende->dependence_id = $request->dependence_id;
        $attende->position_id = $request->position_id;

        $attende->save();
        $attende->refresh();

        return response()->json([
            'message' => 'Attende created',
            'attende_id' => $attende->id
        ], 201);
    }

}
