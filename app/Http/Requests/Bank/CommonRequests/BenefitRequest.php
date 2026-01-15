<?php

namespace App\Http\Requests\Bank\CommonRequests;

use Illuminate\Foundation\Http\FormRequest;

class BenefitRequest extends FormRequest
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
            'brand_title' => ['required', 'regex:/[a-zA-Z]/'],
            'amount' => ['required', 'numeric', 'max:100'],
        ];
    }
    public function messages()
    {
        return [
            'brand_title.required' => 'Brand name is required.',
            'brand_title.regex'    => 'Brand name cannot be numbers only.',
            'amount.required'      => 'Discount amount is required.',
            'amount.max'           => 'Discount amount cannot be more than 100.',
        ];
    }
}
