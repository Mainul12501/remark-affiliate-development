<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRegistraionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Email: required, valid format, unique
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],

            // Password: required, confirmed, min 8 chars, uppercase, lowercase, number, special char
            'password' => [
                'required', // expects password_confirmation field
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^()_+=\-]).+$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',

            'password.required' => 'Password is required',
            'password.confirmed' => 'Password and Confirm Password do not match',
            'password.min' => 'Password must be at least 8 characters',
            'password.regex' => 'Password must include uppercase, lowercase, number, and special character',
        ];
    }
}
