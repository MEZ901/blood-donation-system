<?php

namespace App\Http\Resources\hospital;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city->name,
            'address' => $this->address,
            'responsible' => $this->user->first_name . ' ' . $this->user->last_name,
        ];
    }
}
