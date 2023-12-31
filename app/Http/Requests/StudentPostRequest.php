<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sNumber' => 'required|unique:students|max:10',
            'name' => 'required|max:50',
            'email' => 'nullable|email||unique:students|max:100',
            'twitter' => 'nullable|unique:students|max:50',
            'other' => 'nullable|max:500',
            'department_id' => 'required',
        ];
    }
}
