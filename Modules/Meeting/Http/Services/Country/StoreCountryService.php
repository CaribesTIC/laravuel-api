<?php
namespace Modules\Meeting\Http\Services\Country;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Country\StoreCountryRequest;
use Modules\Meeting\Entities\Country;

class StoreCountryService
{
    static public function execute(StoreCountryRequest $request): JsonResponse
    {
        $country = new Country;

        $country->name = $request->name;
        
        $country->save();

        $country->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $country->id
        ], 201);
  }

}