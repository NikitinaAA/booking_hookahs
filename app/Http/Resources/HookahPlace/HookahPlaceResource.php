<?php

namespace App\Http\Resources\HookahPlace;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Hookah\HookahResource;

class HookahPlaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hookahs' => HookahResource::collection($this->whenLoaded('hookahs'))
        ];
    }
}
