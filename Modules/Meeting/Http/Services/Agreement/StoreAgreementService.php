<?php
namespace Modules\Meeting\Http\Services\Agreement;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Entities\Agreement;
use Modules\Meeting\Http\Requests\Agreement\StoreAgreementRequest;

class StoreAgreementService
{
  
    static public function execute(StoreAgreementRequest $request): JsonResponse
    {     
        $agreement = new Agreement();
        
        $agreement->meeting_id = $request->meeting_id;
        $agreement->agreement = $request->agreement;
        $agreement->responsible = $request->responsible;
        $agreement->observation = $request->observation;

        $agreement->save();
        $agreement->refresh();

        return response()->json([
            'message' => 'Agreement created',
            'agreement_id' => $agreement->id
        ], 201);
    }

}
