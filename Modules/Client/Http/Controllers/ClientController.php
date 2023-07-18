<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Client\Http\Resources\ClientResource;
use Modules\Client\Http\Requests\Client\{
    StoreClientRequest,
    UpdateClientRequest
};
use Modules\Client\Http\Services\Client\{
    StoreClientService,
    IndexClientService,
    UpdateClientService
};
use Modules\Client\Entities\Client;

class ClientController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexClientService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreClientRequest $request): JsonResponse
    {
        return StoreClientService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Client $client): ClientResource | JsonResponse
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        return UpdateClientService::execute($request, $client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Client::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Client::all());
    }
}
