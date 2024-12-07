<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            //
            'nip' => 'required|string|max:20',
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required',
            'phone_number' => 'nullable|string|max:20',
        ];
    }
}
