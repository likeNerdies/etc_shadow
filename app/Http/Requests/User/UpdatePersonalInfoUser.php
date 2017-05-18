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
            'dni'=>'nullable|unique:users,dni|min:9|max:9',
            'name' => 'required|min:2|max:100',
            'first_surname'=>'required|min:2|max:100',
            'second_surname'=>'nullable',
            'email' => 'sometimes|required|email|unique:users,email,',//todo modicacion en email---unique problem while updating from admin-client
            'phone_number'=>'nullable|max:11',
        ];
    }
}
