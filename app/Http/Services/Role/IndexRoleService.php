<?php

namespace App\Http\Services\Role;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use \App\Models\Role;

class IndexRoleService
{

  /**
   * Display a listing of the resource.
   *
   * @return \Inertia\Response
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Role::query();

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
        $roles = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $roles,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
