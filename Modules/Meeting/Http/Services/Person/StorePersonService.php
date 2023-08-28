<?php
namespace Modules\Meeting\Http\Services\Person;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Person\StorePersonRequest;
use Modules\Meeting\Entities\Person;

class StorePersonService
{
    static public function execute(StorePersonRequest $request): JsonResponse
    {
        $person = new Person;

        $person->email = $request->email;
        $person->type = $request->type;
        $person->identification_card = $request->identification_card;
        $person->business_name = $request->business_name;
        $person->phone = $request->phone;
        $person->country_id = $request->country_id;
        $person->domicile = $request->domicile;
        
        $person->save();

        $person->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $person->id
        ], 201);
  }

}





