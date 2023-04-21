<?php

namespace App\Http\Resources\appointment;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'date' => $this->date,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'blood_drive_id' => $this->blood_drive_id ? [
                'id' => $this->bloodDrive->id,
                'city_id' => $this->bloodDrive->city->name,
                'address' => $this->bloodDrive->address,
                'date' => $this->bloodDrive->date,
                'hospital_id' => $this->bloodDrive->hospital->name,
                'hasMinimumDonors' => $this->bloodDrive->hasMinimumDonors,
                'status' => $this->bloodDrive->status,
            ] : null,
            'hospital_id' => $this->hospital_id ? [
                'id' => $this->hospital->id,
                'name' => $this->hospital->name,
                'city_id' => $this->hospital->city->name,
                'address' => $this->hospital->address,
            ] : null,
        ];
    }
}
