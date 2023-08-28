<?php

namespace Modules\Meeting\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'country_id' => $this->country_id,
            'place' => $this->place,
            'subject' => $this->subject,
            'reason' => $this->reason,
            'observation' => $this->observation,
            
        ];
    }
}
