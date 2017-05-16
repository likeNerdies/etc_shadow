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
            'name' =>
                array(
                    'required',
                    'regex:/^[a-zA-Z\' ]+$/'
                ),
           /* 'price' =>
                array(
                    'required',
                    'regex:/(^([0-9]{1,})$)/'
                ),*/
            'description' => 'required',
            'expiration_date' => 'required|date',
            'weight' =>
                array(
                    'required',
                    'regex:/(^([0-9]{1,})$)/'
                ),
            'vegetarian'=>'numeric|min:0|max:1',
            'vegan'=>'numeric|min:0|max:1',
            'organic'=>'numeric|min:0|max:1',
            'stock' =>
                array(
                    'required',
                    'regex:/(^([0-9]){0,}$)/'
                ),
            'ingredients'  => 'required|array|min:1',//input type hidden ingredients

        ];
       /* $photos = count($this->input('photos'));
        foreach (range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'required|image|mimes:jpeg,bmp,png|max:5000';
        }
*/
        return $rules;
    }
}
