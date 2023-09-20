<?php

namespace Modules\Meeting\Http\Services\Person;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Meeting\Entities\Person;

class IndexPersonService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Person::query();

        /* search */
        $search = strtolower($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                ->where(\DB::raw('lower(email)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(identification_card)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(business_name)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(phone)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(domicile)') , "like", "%$search%")                
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
        $people = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $people,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
