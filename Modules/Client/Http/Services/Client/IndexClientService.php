<?php

namespace Modules\Client\Http\Services\Client;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Client\Entities\Client;

class IndexClientService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Client::query();

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
        $clients = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $clients,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
