<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageValidation extends FormRequest
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
        /*  $nbr = count($this->input('image')) - 1;
          foreach(range(0, $nbr) as $index) {
              $rules['image.' . $index] = 'image|mimes:jpeg,png,jpg,gif,svg|max:5000';
          }
          return $rules;*/
        $retorn = [];
        if (($this->file('image.0'))) {
            $retorn["image.0"] = 'image|mimes:jpeg,png,jpg,gif,svg|max:3000';
        }
        if (($this->file('image.1'))) {
            $retorn["image.1"] = 'image|mimes:jpeg,png,jpg,gif,svg|max:3000';
        }
        if (($this->file('image.2'))) {
            $retorn["image.2"] = 'image|mimes:jpeg,png,jpg,gif,svg|max:3000';
        }
        return $retorn;
    }
}
