<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\EntityResource;
use Modules\Meeting\Http\Requests\Entity\{
    StoreEntityRequest,
    UpdateEntityRequest
};
use Modules\Meeting\Http\Services\Entity\{
    StoreEntityService,
    IndexEntityService,
    UpdateEntityService
};
use Modules\Meeting\Entities\Entity;

class EntityController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexEntityService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreEntityRequest $request): JsonResponse
    {
        return StoreEntityService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Entity $entity): EntityResource | JsonResponse
    {
        return new EntityResource($entity);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateEntityRequest $request, Entity $entity): JsonResponse
    {
        return UpdateEntityService::execute($request, $entity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Entity::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Entity::all());
    }
}
