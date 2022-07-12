<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
            'brand_id' => 'required|integer',
            'qty' => 'required|integer',
            'boarding_date' => 'required|date',
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
            'name.required' => 'El nombre es requerido.',
            'size.required' => 'El tamaño es requerido.',
            'comment.required' => 'La observación es requerida.',
            'brand_id.required' => 'La marca es requerida.',
            'qty.required' => 'La cantidad es requerida.',
            'boarding_date.required' => 'La fecha de embarque es requerida.',
        ];
    }
}
