<?php
namespace Modules\Client\Http\Services\Country;

use Illuminate\Http\JsonResponse;
use Modules\Client\Http\Requests\Country\UpdateCountryRequest;
use Modules\Client\Entities\Country;

class UpdateCountryService
{
    static public function execute(UpdateCountryRequest $request, Country $country): JsonResponse
    {          
        // $country = Country::find($request->id);

        $country->name = $request->name;
        
        $country->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

