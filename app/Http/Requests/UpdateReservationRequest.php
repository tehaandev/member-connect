<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'user_id' => 'required|exists:users,id',
          'amenity_id' => 'required|exists:amenities,id',
          'date' => 'required|date|after:today|before:'.date('Y-m-d', strtotime('+1 year')),
        ];
    }
}
