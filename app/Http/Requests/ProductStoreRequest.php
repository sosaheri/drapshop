<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|max:255',
            'product_type' => 'required|in:hogar,empresarial',
            'product_amount' => 'numeric|required',
            'product_price' => 'required|numeric',
            'product_liable' => 'nullable|max:255',
        ];
    }

    public function attributes(){
            return [
            'product_name' => 'Nombre del producto',
            'product_type' => 'Tipo de producto',
            'product_amount' => 'Cantidad de producto',
            'product_price' => 'Precio del producto',
            'product_total' => 'Total valor del producto',
            'product_liable' => 'Responsable del producto',
            ];


    }

    public function messages()
    {
        return [

            'product_name.required' => 'El campo :attribute es obligatorio',
            'product_name.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'product_type.required' => 'El campo :attribute es obligatorio',
            'product_type.in' => 'El campo :attribute solo puede ser de tipo hogar o empresarial',
            'product_amount.required' => 'El campo :attribute es obligatorio',
            'product_amount.numeric' => 'El campo :attribute debe ser númerico',
            'product_price.required' => 'El campo :attribute es obligatorio',
            'product_price.numeric' => 'El campo :attribute debe ser númerico',
            'product_total.required' => 'El campo :attribute es obligatorio',
            'product_total.numeric' => 'El campo :attribute debe ser númerico',
            'product_liable.max' => 'El campo :attribute debe contener máximo 255 caracteres',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
