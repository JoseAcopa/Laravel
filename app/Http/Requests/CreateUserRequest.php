<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
          'name' => 'max:255|required',
          'user' => 'max:255|required|unique:users',
          'email' => 'max:255|required|unique:users',
          'phone' => 'digits:10|required',
          'password' => 'max:255|required',
          'tipo' => 'max:255|required',
        ];
    }
}
