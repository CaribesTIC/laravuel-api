<?php

namespace Modules\Meeting\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'type' => $this->type,
            'identification_card' => $this->identification_card,
            'business_name' => $this->business_name,
            'phone' => $this->phone,
            'country_id' => $this->country_id,
            'domicile' => $this->domicile,
            
        ];
    }
}
