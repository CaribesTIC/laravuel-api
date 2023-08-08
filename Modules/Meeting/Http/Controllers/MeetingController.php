<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\MeetingResource;
use Modules\Meeting\Http\Requests\Meeting\{
    StoreMeetingRequest,
    UpdateMeetingRequest
};
use Modules\Meeting\Http\Services\Meeting\{
    StoreMeetingService,
    IndexMeetingService,
    UpdateMeetingService
};
use Modules\Meeting\Entities\Meeting;

class MeetingController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexMeetingService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreMeetingRequest $request): JsonResponse
    {
        return StoreMeetingService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Meeting $meeting): MeetingResource | JsonResponse
    {
        return new MeetingResource($meeting);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateMeetingRequest $request, Meeting $meeting): JsonResponse
    {
        return UpdateMeetingService::execute($request, $meeting);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Meeting::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Meeting::all());
    }
}
