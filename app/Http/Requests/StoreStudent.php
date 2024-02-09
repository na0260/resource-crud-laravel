<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
            'FirstName' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'LastName' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        ];
    }

    public function messages()
    {
        return [
            'FirstName.required' => 'First Name is required',
            'FirstName.string' => 'Please Use a Valid Name',
            'FirstName.regex' => 'Only letters and spaces are allowed.',
            'LastName.required' => 'First Name is required',
            'LastName.string' => 'Please Use a Valid Name',
            'LastName.regex' => 'Only letters and spaces are allowed.',
        ];
    }
}
