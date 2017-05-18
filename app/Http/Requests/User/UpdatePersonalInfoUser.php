<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInfoUser extends FormRequest
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
          'dni'=>
              array(
                  'nullable',
                  'regex:/^\d{8}[aA-zZ]{1}$/',
                  'unique:admins,dni,'.Auth::user()->id
              ),
          'name' =>
              array(
                  'required',
                  'regex:/[a-zA-Z]{3,100}/i'
              ),
          'first_surname'=>
              array(
                  'required',
                  'regex:/[a-zA-Z]{3,100}/i'
              ),
          'second_surname'=>
              array(
                  'nullable',
                  'regex:/[a-zA-Z]{3,100}/i'
              ),
          'email' => 'required|email|unique:admins,email,' . Auth::user()->id,//esto evita que de 'error' de email repetido para el mismo usuario
          'phone_number'=>
              array(
                  'nullable|numeric',
                  'regex:/\d{9}'
              ),
        ];
    }
}
