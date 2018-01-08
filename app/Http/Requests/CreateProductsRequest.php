<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductsRequest extends FormRequest
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
          'nInvoice' => 'min:0|max:255',
          'TProducts' => 'max:255|required',
          'initials' => 'max:255|required',
          'provider' => 'max:255|required',
          'checkin' => 'max:255|required',
          'quantity' => 'max:255|required',
          'priceList' => 'max:255|required',
          'cost' => 'max:255|required',
          'description' => 'max:255|required|unique:products',
          'quantity' => 'max:255|required',
          'priceSales1' => 'max:255|required',
          'priceSales2' => 'max:255|required',
          'priceSales3' => 'max:255|required',
          'priceSales4' => 'max:255|required',
          'priceSales5' => 'max:255|required',
        ];
    }
}
