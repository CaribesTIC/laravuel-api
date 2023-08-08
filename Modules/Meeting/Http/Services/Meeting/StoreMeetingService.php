<?php
namespace Modules\Meeting\Http\Services\Meeting;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Meeting\StoreMeetingRequest;
use Modules\Meeting\Entities\Meeting;

class StoreMeetingService
{
    static public function execute(StoreMeetingRequest $request): JsonResponse
    {
        $meeting = new Meeting;

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

        $meeting->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $meeting->id
        ], 201);
  }

}





