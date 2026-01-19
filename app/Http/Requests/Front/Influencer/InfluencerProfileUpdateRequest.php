<?php

namespace App\Http\Requests\Front\Influencer;

use Illuminate\Foundation\Http\FormRequest;

class InfluencerProfileUpdateRequest extends FormRequest
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
            'email' => 'email',
            'mobile' => [
                'nullable', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/',
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Influencer Name is required.',
            'email.email' => 'Provide a valid email address.',
            'mobile.regex' => 'Provide a valid mobile number.',
        ];
    }
}
