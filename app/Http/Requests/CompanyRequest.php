<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'website' => 'sometimes|url',
            'logo' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'The logo is required.',
            'logo.image' => 'The logo must be an image file.',
            'logo.max' => 'The logo must not exceed 2048 kilobytes in size.',
            'logo.dimensions' => 'The logo must have a minimum width of 100 pixels and a minimum height of 100 pixels.',
        ];
    }
}
