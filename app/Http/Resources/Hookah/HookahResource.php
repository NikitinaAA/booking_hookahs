<?php

namespace App\Http\Resources\Hookah;

use App\Http\Resources\HookahPlace\HookahPlaceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HookahResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tube_amount' => $this->tube_amount,
            'hookah_place' => new HookahPlaceResource($this->whenLoaded('hookah_place'))
        ];
    }
}
