<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearCatalogosRequest extends FormRequest
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
          'categoria_id' => 'max:255|required',
          'proveedor_id' => 'max:255|required',
          'unidad' => 'max:255|required',
          'descripcion' => 'max:255|required|unique:catalogs',
        ];
    }
}
