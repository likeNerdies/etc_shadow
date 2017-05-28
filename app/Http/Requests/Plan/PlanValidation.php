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
            'name' =>'required|min:3|max:150',
            'price'=>
                array(
                    'required',
                    'regex:/^(\d{1,3}\.\d{1,2}$)|^(\d{1,3}$)/'
                ),
              'info'=>'nullable|min:3|max:2000',
        ];
    }
}
