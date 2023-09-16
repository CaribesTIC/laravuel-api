<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Meeting\Entities\Agreement;
use Modules\Meeting\Http\Requests\Agreement\{
    StoreAgreementRequest,
    UpdateAgreementRequest    
};
use Modules\Meeting\Http\Services\Agreement\{
    StoreAgreementService,
    UpdateAgreementService
}; 

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByMeeting(Request $request)//: Collection
    {
        return Agreement::where('meeting_id', $request->meetingId)->get();
    }

    /**
     * Store a newly created resource in storage.
     */    
    public function store(StoreAgreementRequest $request): JsonResponse
    {    
        return StoreAgreementService::execute($request);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgreementRequest $request, Agreement $agreement): JsonResponse
    {
        return UpdateAgreementService::execute($request, $agreement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        Agreement::destroy($request->id);

        return response()->json(204);            
    }
}
