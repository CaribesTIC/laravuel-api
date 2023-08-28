<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\PersonResource;
use Modules\Meeting\Http\Requests\Person\{
    StorePersonRequest,
    UpdatePersonRequest
};
use Modules\Meeting\Http\Services\Person\{
    StorePersonService,
    IndexPersonService,
    UpdatePersonService
};
use Modules\Meeting\Entities\Person;

class PersonController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexPersonService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StorePersonRequest $request): JsonResponse
    {
        return StorePersonService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Person $person): PersonResource | JsonResponse
    {
        return new PersonResource($person);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdatePersonRequest $request, Person $person): JsonResponse
    {
        return UpdatePersonService::execute($request, $person);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Person::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Person::all());
    }
}
