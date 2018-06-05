<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuotationRequest extends FormRequest
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
          'cotizacion' => 'max:255|required',
          'fecha' => 'max:255|required',
          'licitacion' => 'max:255|required',
          'nombre' => 'max:255|required',
          'puesto' => 'max:255|required',
          'observaciones' => 'max:1500||required',
          'neto' => 'max:255|required',
          'iva' => 'max:255|required',
          'total' => 'max:255|required',
          'cliente' => 'max:255|required',
          'usuario' => 'max:255|required',
          'RFC' => 'max:255|required',
          'empresa' => 'max:255|required',
          'telefono' => 'digits:10|required',
          'correo' => 'max:255|required',
          'direccion' => 'max:255|required',
        ];
    }
}
