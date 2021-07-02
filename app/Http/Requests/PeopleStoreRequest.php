<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PeopleStoreRequest extends FormRequest
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
            'people_dni' => 'required|numeric|unique:people',
            'people_fname' => 'required|max:255',
            'people_sname' => 'nullable|max:255',
            'people_fsurname' => 'required|max:255',
            'people_ssurname' => 'nullable|max:255',
            'people_birth_at' => 'required',
            'people_phone' => 'nullable|max:12',
            'people_address' => 'nullable',
            'people_email' => 'required|max:255|email:rfc,dns',
            'people_age' => 'numeric|required|min:18|max:65',
        ];
    }

    public function attributes(){
            return [
            'people_dni' => 'DNI',
            'people_fname' => 'Primer Nombre',
            'people_sname' => 'Segundo Nombre',
            'people_fsurname' => 'Primer Apellido',
            'people_ssurname' => 'Segundo Apellido',
            'people_birth_at' => 'Fecha de nacimiento',
            'people_phone' => 'Teléfono',
            'people_address' => 'Dirección',
            'people_email' => 'Correo electronico',
            'people_age' => 'Edad',
            ];


    }

    public function messages()
    {
        return [
            'people_dni.required' => 'El campo :attribute es obligatorio',
            'people_dni.unique' => 'Los datos del campo :attribute ya fueron registrados previamente',
            'people_dni.size' => 'El campo :attribute debe contener máximo 10 caracteres',
            'people_dni.numeric' => 'El campo :attribute debe ser númerico',
            'people_fname.required' => 'El campo :attribute es obligatorio',
            'people_fname.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'people_sname.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'people_fsurname.required' => 'El campo :attribute es obligatorio',
            'people_fsurname.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'people_ssurname.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'people_birth_at.required' => 'El campo :attribute es obligatorio',
            'people_phone.max' => 'El campo :attribute debe contener máximo 12 caracteres',
            'people_email.required' => 'El campo :attribute es obligatorio',
            'people_email.max' => 'El campo :attribute debe contener máximo 255 caracteres',
            'people_email.email' => 'El campo :attribute debe ser un de correo valido',
            'people_age.required' => 'El campo :attribute es obligatorio',
            'people_age.numeric' => 'El campo :attribute debe ser númerico',
            'people_age.min' => 'No es posible realizar el registro persona menor a 18 años',
            'people_age.max' => 'No es posible realizar el registro persona mayor a 65 años',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
