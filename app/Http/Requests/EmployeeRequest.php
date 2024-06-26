<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->method()=='PUT') {
            return [
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'sometimes|email',
                'phone'=>'sometimes',
                'company_id'=>'required'
            ];
        } else {
            return [
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'sometimes|email|unique:employees',
                'phone'=>'sometimes',
                'company_id'=>'required'
            ];
        }
    }
}
