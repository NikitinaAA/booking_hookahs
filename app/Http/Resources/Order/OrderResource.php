<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Hookah\HookahResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'person_amount' => $this->person_amount,
            'reserve_at' => $this->reserve_at,
            'expired_at' => $this->expired_at,
            'hookah' => new HookahResource($this->hookah)
        ];
    }
}
