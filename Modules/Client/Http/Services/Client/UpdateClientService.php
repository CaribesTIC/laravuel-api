<?php
namespace Modules\Client\Http\Services\Client;

use Illuminate\Http\JsonResponse;
use Modules\Client\Http\Requests\Client\UpdateClientRequest;
use Modules\Client\Entities\Client;

class UpdateClientService
{
    static public function execute(UpdateClientRequest $request, Client $client): JsonResponse
    {          
        // $client = Client::find($request->id);

        $client->email = $request->email;
        $client->type = $request->type;
        $client->identification_card = $request->identification_card;
        $client->business_name = $request->business_name;
        $client->phone = $request->phone;
        $client->country_id = $request->country_id;
        $client->domicile = $request->domicile;
        
        $client->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

