<?php

namespace Modules\Meeting\Http\Services\Position;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Meeting\Entities\Position;

class IndexPositionService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Position::query();

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
        $positions = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $positions,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
