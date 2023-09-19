<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\PositionResource;
use Modules\Meeting\Http\Requests\Position\{
    StorePositionRequest,
    UpdatePositionRequest
};
use Modules\Meeting\Http\Services\Position\{
    StorePositionService,
    IndexPositionService,
    UpdatePositionService
};
use Modules\Meeting\Entities\Position;

class PositionController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexPositionService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StorePositionRequest $request): JsonResponse
    {
        return StorePositionService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Position $position): PositionResource | JsonResponse
    {
        return new PositionResource($position);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdatePositionRequest $request, Position $position): JsonResponse
    {
        return UpdatePositionService::execute($request, $position);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Position::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Position::all());
    }
}
