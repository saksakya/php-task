<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPutRequest extends FormRequest
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
            'sNumber' => 'required|max:10',
            'name' => 'required|max:50',
            'email' => 'nullable|email|max:100',
            'twitter' => 'nullable|max:50',
            'other' => 'nullable|max:500',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}
