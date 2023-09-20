<?php

namespace Modules\Meeting\Http\Services\Dependency;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Meeting\Entities\Dependency;

class IndexDependencyService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Dependency::query();

        /* search */
        $search = strtolower($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                ->where(\DB::raw('lower(name)') , "like", "%$search%")                
                ;
            });
        }

        /* sort */
        $sort = $request->input("sort");
        $direction = $request->input("direction") == "desc" ? "desc" : "asc";
        if ($sort) {
            $query->orderBy($sort, $direction);
        }

        /* get paginated results */
        $dependencies = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $dependencies,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
