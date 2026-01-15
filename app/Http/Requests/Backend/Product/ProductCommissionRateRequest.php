<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCommissionRateRequest extends FormRequest
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
            'product_sku' => 'required',
            'commission_type' => 'required|in:percentage,fixed',
            'amount' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get the custom messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'product_sku.required' => 'Please provide a valid product SKU.',

            'commission_type.required' => 'You must select a commission type.',
            'commission_type.in' => 'The commission type must be either "percentage" or "fixed".',

            'amount.required' => 'The commission amount is required.',
            'amount.numeric' => 'The amount must be a valid number.',
            'amount.min' => 'The commission amount cannot be less than 0.',
        ];
    }
}
