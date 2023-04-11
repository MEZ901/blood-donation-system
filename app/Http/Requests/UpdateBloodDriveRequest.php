<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBloodDriveRequest extends FormRequest
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
            'city_id' => 'sometimes|required|integer|exists:cities,id',
            'address' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'hospital_id' => 'sometimes|required|integer|exists:hospitals,id',
            'hasMinimumDonors' => 'sometimes|required|boolean',
            'status' => 'sometimes|required|string|max:255',
        ];
    }
}
