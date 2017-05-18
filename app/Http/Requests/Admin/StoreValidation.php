<?php

namespace App\Http\Requests\Admin;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $retorn=false;
        if(Auth::user()->can_create){
            $retorn=true;
        }
        return $retorn;
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
           // 'password' => 'required|min:8|confirmed',
            'phone_number'=>
                array(
                    'nullable',
                    'numeric',
                    'regex:/\d{9}/'
                ),
        ];
    }
}
