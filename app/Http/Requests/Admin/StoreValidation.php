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
            'dni'=>'nullable|unique:admins,dni|min:9|max:9',
            'name' => 'required|min:2|max:100',
            'first_surname'=>'required|min:2|max:100',
            'second_surname'=>'nullable',
            'email' => 'required|email|unique:admins,email,' . Auth::user()->id,//esto evita que de 'error' de email repetido
            'password' => 'required|min:8|confirmed',
            'phone_number'=>'nullable|numeric',
        ];
    }
}
