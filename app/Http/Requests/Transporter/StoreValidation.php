<?php

namespace App\Http\Requests\Transporter;

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
            'name'=>'required|min:2',
            'cif'=>array(
                'required',
                'regex:/^[a-zA-Z][0-9]{8}$/',
            ),
            'phone_number'=>'required|numeric'
        ];
    }
}
