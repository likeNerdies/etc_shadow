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
            'street'=>'required|string',
            'building_number' => 'required|numeric|between:1,9999',
            'building_block'=>'nullable|string',
            'floor'=>'nullable|numeric|between:1,9999',
            'door'=>'nullable|string',
            'postal_code'=>array(
                'required',
                'regex:/^(5[0-2]|[0-4][0-9])[0-9]{3}$/'
            ),
            'town'=>'required|string',
            'province' => 'required|string',
            'country'=>'required|string',
        ];
    }
}
