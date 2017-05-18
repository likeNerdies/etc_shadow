<?php

namespace App\Http\Requests\Ingredient;

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
            'name' =>
                array(
                    'required',
                    'regex:/[a-zA-Z]{3,100}/i'
                ),
            'info'=>
                array(
                    'required',
                    'regex:/[a-zA-Z]{3,100}/i'
                ),
            'image'=>'image|mimes:jpeg,bmp,png|max:3000',
            'allergies'=>''
        ];
    }
}
