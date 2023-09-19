<?php
namespace Modules\Meeting\Http\Services\Dependency;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Dependency\StoreDependencyRequest;
use Modules\Meeting\Entities\Dependency;

class StoreDependencyService
{
    static public function execute(StoreDependencyRequest $request): JsonResponse
    {
        $dependency = new Dependency;

        $dependency->name = $request->name;
        
        $dependency->save();

        $dependency->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $dependency->id
        ], 201);
  }

}