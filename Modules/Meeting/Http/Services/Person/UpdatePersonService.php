<?php
namespace Modules\Meeting\Http\Services\Person;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Person\UpdatePersonRequest;
use Modules\Meeting\Entities\Person;

class UpdatePersonService
{
    static public function execute(UpdatePersonRequest $request, Person $person): JsonResponse
    {          
        // $person = Person::find($request->id);

        $person->email = $request->email;
        $person->type = $request->type;
        $person->identification_card = $request->identification_card;
        $person->business_name = $request->business_name;
        $person->phone = $request->phone;
        $person->country_id = $request->country_id;
        $person->domicile = $request->domicile;
        
        $person->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

