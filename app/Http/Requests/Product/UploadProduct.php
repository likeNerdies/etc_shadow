<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UploadProduct extends FormRequest
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
        $rules = [
            'name' =>'required|min:3|max:150',
            'price' =>
                array(
                    'required',
                    'regex:/^(\d{1,3}\.\d{1,2}$)|^(\d{1,3}$)/'
                ),
            'description' =>'required|min:3|max:2000',
            'expiration_date' => 'required|date|date_format:"Y/m/d|after:today',
            'weight' =>'required|integer|between:1,9999',
            'real_weight' =>'nullable|integer|between:1,9999',
            'vegetarian'=>'nullable|boolean',
            'vegan'=>'nullable|boolean',
            'organic'=>'nullable|boolean',
            'stock' =>'required|integer|between:1,3000',
            /* Clara: 18/05 */
            'dimensions' =>'nullable|integer|min:1|max:3',
            'ingredients'  => 'required|array|min:1',//input type hidden ingredients

        ];
        return $rules;
    }
}
