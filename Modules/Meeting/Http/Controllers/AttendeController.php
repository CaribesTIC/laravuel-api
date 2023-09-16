<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Meeting\Entities\Attende;
use Modules\Meeting\Http\Requests\Attende\{
    StoreAttendeRequest,
    UpdateAttendeRequest    
};
use Modules\Meeting\Http\Services\Attende\{
    StoreAttendeService,
    UpdateAttendeService
}; 

class AttendeController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByMeeting(Request $request)//: Collection
    {
        return Attende::where('meeting_id', $request->meetingId)->get();
    }

    /**
     * Store a newly created resource in storage.
     */    
    public function store(StoreAttendeRequest $request): JsonResponse
    {    
        return StoreAttendeService::execute($request);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendeRequest $request, Attende $attende): JsonResponse
    {
        return UpdateAttendeService::execute($request, $attende);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        Attende::destroy($request->id);

        return response()->json(204);            
    }
}
