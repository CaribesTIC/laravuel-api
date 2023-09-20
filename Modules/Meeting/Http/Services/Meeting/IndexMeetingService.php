<?php

namespace Modules\Meeting\Http\Services\Meeting;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Meeting\Entities\Meeting;

class IndexMeetingService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Meeting::query();

        /* search */
        $search = strtolower($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                ->where(\DB::raw('lower(place)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(subject)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(reason)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(observation)') , "like", "%$search%")                
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
        $meetings = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $meetings,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
