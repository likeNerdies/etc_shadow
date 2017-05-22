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
            'name'=>'required|min:3|max:150',
            'cif'=>array(
                'required',
                'regex:/^[a-zA-Z][0-9]{8}$/',
                'unique:admins,dni,'.$this->id,
            ),
            'phone_number'=> array(
                'required',
                'min:9',
                'regex:/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/'
            ),
        ];
    }
}
