<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'profileImage' => $this->image->path,
            'age' => $this->age,
            'cin' => $this->cin,
            'city' => $this->city->name,
            'phone' => $this->phone,
            'bloodType' => $this->bloodType ? $this->bloodType->name : null,
            'email' => $this->email,
        ];
    }
}
