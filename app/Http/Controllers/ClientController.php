<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Http\Resources\ClientResource;
use App\Http\Requests\Client\{
    StoreClientRequest,
    UpdateClientRequest
};
use App\Http\Services\Client\{
    StoreClientService,
    IndexClientService,
    UpdateClientService
};

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
}
