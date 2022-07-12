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
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'size.string' => 'El tamaño debe ser una cadena de texto.',
            'size.max' => 'El tamaño no puede tener más de 255 caracteres.',
            'comment.string' => 'La observación debe ser una cadena de texto.',
            'comment.max' => 'La observación no puede tener más de 255 caracteres.',
            'brand_id.integer' => 'La marca debe ser un número entero.',
            'qty.integer' => 'La cantidad debe ser un número entero.',
            'boarding_date.date' => 'La fecha de embarque debe ser una fecha válida.',
        ];
    }
}
