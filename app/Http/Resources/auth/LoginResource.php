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
            'status' => 'success',
            'user' => [
                'id' => $this->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'age' => $this->age,
                'cin' => $this->cin,
                'city' => $this->city->name,
                'blood_type' => $this->bloodType ? $this->bloodType->name : null,
                'email' => $this->email,
            ],
            'authorization' => [
                'token' => $this->token,
                'type' => 'bearer',
            ]
        ];
    }
}
