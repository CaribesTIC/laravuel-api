<?php
namespace Modules\Meeting\Http\Services\Meeting;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Meeting\UpdateMeetingRequest;
use Modules\Meeting\Entities\Meeting;

class UpdateMeetingService
{
    static public function execute(UpdateMeetingRequest $request, Meeting $meeting): JsonResponse
    {          
        // $meeting = Meeting::find($request->id);

        $meeting->country_id = $request->country_id;
        $meeting->place = $request->place;
        $meeting->subject = $request->subject;
        $meeting->reason = $request->reason;
        $meeting->observation = $request->observation;
        
        $meeting->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

