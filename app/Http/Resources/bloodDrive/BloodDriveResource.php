<?php

namespace App\Http\Resources\bloodDrive;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodDriveResource extends JsonResource
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
            'city' => $this->city->name,
            'address' => $this->address,
            'date' => $this->date,
            'hospital' => $this->hospital->name,
            'hasMinimumDonors' => $this->hasMinimumDonors,
            'status' => $this->status,
        ];
    }
}
