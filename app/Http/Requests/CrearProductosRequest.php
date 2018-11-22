<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearProductosRequest extends FormRequest
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
          'catalogo_id' => 'max:255|required',
          'fecha_entrada' => 'max:255|required',
          'tipo_producto' => 'max:255|required',
          'cantidad_entrada' => 'max:255|required',
          'costo' => 'max:255|required',
          'proveedor' => 'max:255|required',
          'unidad_medida' => 'max:255|required',
          'moneda' => 'max:255|required',
          'descripcion' => 'max:255|required',
          'categoria' => 'max:255|required',
          'precio_venta1' => 'max:255|required',
          'precio_venta2' => 'max:255|required',
          'precio_venta3' => 'max:255|required',
          'precio_venta4' => 'max:255|required',
        ];
    }
}
