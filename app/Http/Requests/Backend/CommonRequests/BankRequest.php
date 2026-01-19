<?php

namespace App\Http\Requests\Backend\CommonRequests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:banks,name',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bank name is required.',
            'name.string'   => 'Bank name must be a valid text.',
            'name.max'      => 'Bank name may not be greater than 255 characters.',
            'name.unique'   => 'This bank name already exists.',

            'logo.required' => 'Bank logo is required.',
            'logo.image'    => 'The logo must be an image file.',
            'logo.mimes'    => 'The logo must be a file of type: jpeg, png, jpg, or gif.',
            'logo.max'      => 'The logo size must not exceed 2MB.',
        ];
    }
}
