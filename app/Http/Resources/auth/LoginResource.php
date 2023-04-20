<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'user' => [
                'id' => $this->id,
                'firstName' => $this->first_name,
                'lastName' => $this->last_name,
                'profileImage' => $this->image ? $this->image->path : null,
                'age' => $this->age,
                'cin' => $this->cin,
                'city' => $this->city->name,
                'phone' => $this->phone,
                'bloodType' => $this->bloodType ? $this->bloodType->name : null,
                'email' => $this->email,
            ],
            'authorization' => [
                'token' => $this->token,
                'type' => 'bearer',
            ]
        ];
    }
}
