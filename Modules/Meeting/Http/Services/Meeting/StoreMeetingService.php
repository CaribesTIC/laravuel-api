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

        $meeting->country_id = $request->country_id;
        $meeting->place = $request->place;
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