<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;
class AddressFormValidation extends FormRequest
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
            'street'=>'required',
            'number' => 'required|numeric',
            'postal_code'=>'required|numeric',
            'town'=>'required',
            'province' => 'required',
            'country'=>'required',
        ];
    }
}
