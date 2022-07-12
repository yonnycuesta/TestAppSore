<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
            'brand_id' => 'nullable|integer',
            'qty' => 'nullable|integer',
            'boarding_date' => 'nullable|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'size.required' => 'The size field is required.',
            'comment.required' => 'The comment field is required.',
            'brand_id.required' => 'The brand field is required.',
            'qty.required' => 'The qty field is required.',
            'boarding_date.required' => 'The boarding date field is required.',
        ];
    }
}
