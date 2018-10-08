<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
          'nombre_empresa' => 'max:255|required|unique:suppliers',
          'rfc' => 'max:255|required',
          'direccion' => 'max:255|required',
          'telefono' => 'digits:10|required',
          'correo' => 'max:255|required|unique:suppliers',
        ];
    }
}
