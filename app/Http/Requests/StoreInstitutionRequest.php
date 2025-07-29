<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'rut' => 'required|string|unique:institutions,rut',
            'region' => 'required|string',
            'comuna' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'start_date' => 'required|date',
        ];
    }
}
