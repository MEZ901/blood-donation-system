<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBloodDriveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'city_id' => 'required|integer|exists:cities,id',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
            'hospital_id' => 'required|integer|exists:hospitals,id',
            'hasMinimumDonors' => 'required|boolean',
            'status' => 'required|string|max:255',
        ];
    }
}
