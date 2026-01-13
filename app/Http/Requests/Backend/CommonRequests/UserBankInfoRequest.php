<?php

namespace App\Http\Requests\Backend\CommonRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserBankInfoRequest extends FormRequest
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
            'mobile_number' => ['nullable', 'regex:/^(01)[0-9]{9}$/'],
            'account_number' => ['nullable', 'numeric'],
            'tin_number' => ['nullable', 'numeric'],
            'cheque_img' => ['nullable', 'image', 'max:5120'],
            'tin_cert_img' => ['nullable', 'image', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'mobile_number.required' => 'Mobile number is required.',
            'mobile_number.regex'    => 'Please enter a valid Bangladeshi mobile number (01XXXXXXXXX).',

            'account_number.required' => 'Bank account number is required.',
            'account_number.numeric'  => 'Bank account number must contain numbers only.',

            'tin_number.numeric' => 'TIN number must contain numbers only.',

            'cheque_img.required' => 'Cheque book image is required.',
            'cheque_img.image'    => 'Cheque book must be an image file (JPG, JPEG, PNG).',
            'cheque_img.max'      => 'Cheque book image size must not exceed 5 MB.',

            'tin_cert_img.image' => 'TIN certificate must be an image file (JPG, JPEG, PNG).',
            'tin_cert_img.max'   => 'TIN certificate image size must not exceed 5 MB.',
        ];
    }

}
