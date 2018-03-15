<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
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
          'category' => 'max:255|required',
          'proveedor-view' => 'max:255|required',
          'fecha_entrada' => 'max:255|required',
          'cantidad_entrada' => 'max:255|required',
          'unidad' => 'max:255|required',
          'moneda' => 'max:20|required',
          'categoria-view' => 'required',
          'description' => 'max:255|required',
          'priceSales1' => 'max:255|required',
          'priceSales2' => 'max:255|required',
          'priceSales3' => 'max:255|required',
          'priceSales4' => 'max:255|required',
        ];
    }
}
