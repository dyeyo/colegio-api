<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'rut' => 'required|string|unique:users,rut',
            'phone' => 'nullable|string',
            'school_ids' => 'required|array|min:1',
            'school_ids.*' => 'exists:schools,id',
        ];
    }
}
