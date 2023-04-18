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
            'geographicCoordinate' => $this->geographic_coordinate,
            'responsible' => [
                'id' => $this->user->id,
                'firstName' => $this->user->first_name,
                'lastName' => $this->user->last_name,
                'profileImage' => $this->user->image->path,
                'phone' => $this->user->phone,
            ],
        ];
    }
}
