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
            'city_id' => $this->city_id,
            'app_date' => $this->app_date,
            'start_time' => $this->start_time,
            'place' => $this->place,
            'entity_id' => $this->entity_id,
            'dependence_id' => $this->dependence_id,
            'subject' => $this->subject,
            'reason' => $this->reason,
            'observation' => $this->observation,
            
        ];
    }
}
