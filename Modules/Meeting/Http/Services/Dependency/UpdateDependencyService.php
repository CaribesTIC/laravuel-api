<?php
namespace Modules\Meeting\Http\Services\Dependency;

use Illuminate\Http\JsonResponse;
use Modules\Meeting\Http\Requests\Dependency\UpdateDependencyRequest;
use Modules\Meeting\Entities\Dependency;

class UpdateDependencyService
{
    static public function execute(UpdateDependencyRequest $request, Dependency $dependency): JsonResponse
    {          
        // $dependency = Dependency::find($request->id);

        $dependency->name = $request->name;
        
        $dependency->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

