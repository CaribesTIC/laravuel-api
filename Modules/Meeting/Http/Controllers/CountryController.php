<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\CountryResource;
use Modules\Meeting\Http\Requests\Country\{
    StoreCountryRequest,
    UpdateCountryRequest
};
use Modules\Meeting\Http\Services\Country\{
    StoreCountryService,
    IndexCountryService,
    UpdateCountryService
};
use Modules\Meeting\Entities\Country;

class CountryController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexCountryService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreCountryRequest $request): JsonResponse
    {
        return StoreCountryService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Country $country): CountryResource | JsonResponse
    {
        return new CountryResource($country);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateCountryRequest $request, Country $country): JsonResponse
    {
        return UpdateCountryService::execute($request, $country);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Country::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Country::all());
    }
}
