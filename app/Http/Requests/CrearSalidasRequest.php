<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearSalidasRequest extends FormRequest
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
          'fecha_salida' => 'max:255|required',
          'cantidad_salida' => 'max:255|required',
          'precio_venta' => 'max:255|required',
          'moneda' => 'max:255|required',
          'producto_id' => 'max:255|required',
          'categoria_id' => 'max:255|required',
          'proveedor_id' => 'max:255|required',
          'costo' => 'max:255|required',
          'stock' => 'max:255|required',
        ];
    }
}
