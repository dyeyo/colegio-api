<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'rut' => 'required|string|unique:schools,rut',
            'region' => 'required|string',
            'comuna' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'institution_id' => 'required|exists:institutions,id',
        ];
    }
}
