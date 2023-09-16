<?php
namespace Modules\Meeting\Http\Services\Agreement;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Agreement;
use Modules\Meeting\Http\Requests\Agreement\UpdateAgreementRequest;

class UpdateAgreementService
{
  
    static public function execute(UpdateAgreementRequest $request, Agreement $agreement): JsonResponse
    {     
        
        $agreement->meeting_id = $request->meeting_id;
        $agreement->agreement = $request->agreement;
        $agreement->responsible = $request->responsible;
        $agreement->observation = $request->observation;

        $agreement->save();        

        return response()->json([
            'message' => 'Agreement updated'            
        ], 200);
    }

}
