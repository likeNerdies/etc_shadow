<?php

namespace App\Http\Requests\Admin;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateValidation extends FormRequest
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
                    'regex:/((^[A-Z,a-z]{1})(\d{7})([A-Z,a-z]{1}))|(^\d{8}[aA-zZ]{1}$)/',
                    'unique:admins,dni,'.$this->id,
                ),
            'name' =>'required|min:3|max:65',
            'first_surname'=>'required|min:3|max:65',
            'second_surname'=>'nullable|min:3|max:65',
            'email' => 'required|email|unique:admins,email, '.$this->id,
             'password' => 'nullable|min:8|confirmed',
            'phone_number'=>
                array(
                    'nullable',
                    'min:9',
                    'regex:/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/'
                ),
        ];
    }
}
