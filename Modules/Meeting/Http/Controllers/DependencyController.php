<?php

namespace Modules\Meeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Meeting\Http\Resources\DependencyResource;
use Modules\Meeting\Http\Requests\Dependency\{
    StoreDependencyRequest,
    UpdateDependencyRequest
};
use Modules\Meeting\Http\Services\Dependency\{
    StoreDependencyService,
    IndexDependencyService,
    UpdateDependencyService
};
use Modules\Meeting\Entities\Dependency;

class DependencyController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexDependencyService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreDependencyRequest $request): JsonResponse
    {
        return StoreDependencyService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Dependency $dependency): DependencyResource | JsonResponse
    {
        return new DependencyResource($dependency);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateDependencyRequest $request, Dependency $dependency): JsonResponse
    {
        return UpdateDependencyService::execute($request, $dependency);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Dependency::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Dependency::all());
    }
}
