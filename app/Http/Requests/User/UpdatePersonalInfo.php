<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UpdatePersonalInfo extends FormRequest
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
                    'regex:/((^[A-Z,a-z]{1})(\d{7})([A-Z,a-z]{1}))|(^\d{8}[aA-zZ]{1}$)/',
                    'unique:admins,dni,'.Auth::user()->id
                ),
            'name' =>
                array(
                    'required',
                    'regex:/[a-zA-Z]{2,100}/i'
                ),
            'first_surname'=>
                array(
                    'required',
                    'regex:/[a-zA-Z]{2,100}/i'
                ),
            'second_surname'=>
                array(
                    'nullable',
                    'regex:/[a-zA-Z]{2,100}/i'
                ),
            'email' => 'required|email|unique:admins,email,' . Auth::user()->id,//esto evita que de 'error' de email repetido para el mismo usuario
            'phone_number'=>
                array(
                    'nullable',
                    'min:9',
                    'regex:/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/'
                ),
        ];
    }
}
