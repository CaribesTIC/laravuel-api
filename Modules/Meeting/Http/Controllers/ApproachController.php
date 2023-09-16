<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Meeting\Entities\Approach;
use Modules\Meeting\Http\Requests\Approach\{
    StoreApproachRequest,
    UpdateApproachRequest    
};
use Modules\Meeting\Http\Services\Approach\{
    StoreApproachService,
    UpdateApproachService
}; 

class ApproachController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByMeeting(Request $request)//: Collection
    {
        return Approach::where('meeting_id', $request->meetingId)->get();
    }

    /**
     * Store a newly created resource in storage.
     */    
    public function store(StoreApproachRequest $request): JsonResponse
    {    
        return StoreApproachService::execute($request);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApproachRequest $request, Approach $approach): JsonResponse
    {
        return UpdateApproachService::execute($request, $approach);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        Approach::destroy($request->id);

        return response()->json(204);            
    }
}
