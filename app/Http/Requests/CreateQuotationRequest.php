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
          'numero_cotizacion' => 'max:255|required',
          'fecha' => 'max:255|required',
          'licitacion' => 'max:255|required',
          'nombre_cotizar' => 'max:255|required',
          'puesto' => 'max:255|required',
          'observaciones' => 'max:10000||required',
          'total' => 'max:255|required',
          'cliente_id' => 'max:255|required',
          'rfc_cliente' => 'max:255|required',
          'nombre_empresa' => 'max:255|required',
          'telefono_cliente' => 'digits:10|required',
          'correo_cliente' => 'max:255|required',
          'direccion' => 'max:255|required',
          'total' => 'max:255|required',
        ];
    }
}
