<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class PlanValidation extends FormRequest
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
            'price'=>
                array(
                    'required',
                    'regex:/^\d{1,2}[,|.]\d{1,2}$/'
                ),
        ];
    }
}
