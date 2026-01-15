<?php

namespace App\Http\Requests\Bank\CommonRequests;

use Illuminate\Foundation\Http\FormRequest;

class BenefitCategoryRequest extends FormRequest
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
            'title' => 'required',
            'user_type' => 'required',
        ];
    }
}
