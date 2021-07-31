<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            "country" => $this->country,
            "country_code" => $this->country_code,
            "phone_number" => $this->phone_number,
            "state" => $this->state,
        ];
    }
}
