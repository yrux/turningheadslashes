<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableproductsRequest extends FormRequest
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
            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:category,slug,'.$this->id,
            'category_id'=>'required',
            'stock'=>'required_if:manage_stock,on'.($this->manage_stock?'|min:1|numeric':''),
            'price'=>'required|min:1|numeric',

        ];
    }
}
