<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Replace with your authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'registration_no' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255',
            'engine_no' => 'required|string|max:255',
            'insurance_valid_upto' => 'required|date',
            'tax_valid_upto' => 'required|date',
            'fitness_valid_upto' => 'required|date',
            'pollution_valid_upto' => 'required|date',
            'permit_valid_upto' => 'required|date',
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'required|string|max:255',
            'helper_name' => 'required|string|max:255',
            'helper_phone' => 'required|string|max:255',
        ];
    }
}
