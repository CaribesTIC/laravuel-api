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

        $meeting->city_id = $request->city_id;
        $meeting->app_date = $request->app_date;
        $meeting->start_time = $request->start_time;
        $meeting->place = $request->place;
        $meeting->entity_id = $request->entity_id;
        $meeting->dependence_id = $request->dependence_id;
        $meeting->subject = $request->subject;
        $meeting->reason = $request->reason;
        $meeting->observation = $request->observation;
        
        $meeting->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

