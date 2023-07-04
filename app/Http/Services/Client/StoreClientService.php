<?php
namespace Modules\Client\Http\Services\Client;

use Illuminate\Http\JsonResponse;
use Modules\Client\Http\Requests\Client\StoreClientRequest;
use Modules\Client\Entities\Client;

class StoreClientService
{
    static public function execute(StoreClientRequest $request): JsonResponse
    {
        $client = new Client;

        $client->email = $request->email;
        $client->type = $request->type;
        $client->identification_card = $request->identification_card;
        $client->business_name = $request->business_name;
        $client->phone = $request->phone;
        $client->country_id = $request->country_id;
        $client->domicile = $request->domicile;
        
        $client->save();

        $client->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $client->id
        ], 201);
  }

}





