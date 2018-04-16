<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCheckoutRequest extends FormRequest
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
          'categoria' => 'max:255|required',
          'iniciales' => 'max:255|required',
          'proveedor-view' => 'max:255|required',
          'unidad' => 'max:255|required',
          'salida' => 'max:255|required',
          'description' => 'max:255|required',
          'precio_lista' => 'max:255|required',
          'costo' => 'max:255|required',
          'moneda' => 'max:255|required',
          'stock' => 'max:255|required',
          'cantidad' => 'max:255|required',
          'precio' => 'max:255|required',
        ];
    }
}
