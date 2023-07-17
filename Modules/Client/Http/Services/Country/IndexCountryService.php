<?php

namespace Modules\Client\Http\Services\Country;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Client\Entities\Country;

class IndexCountryService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Country::query();

        /* search */
        $search = $request->input("search");
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where("name", "like", "%$search%");
            });
        }

        /* sort */
        $sort = $request->input("sort");
        $direction = $request->input("direction") == "desc" ? "desc" : "asc";
        if ($sort) {
            $query->orderBy($sort, $direction);
        }

        /* get paginated results */
        $countries = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $countries,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
