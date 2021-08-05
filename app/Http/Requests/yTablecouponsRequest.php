<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTablecouponsRequest extends FormRequest
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
            'coupon_code'=>'required|max:255|unique:coupons,coupon_code,'.$this->id,
            'discount_value'=>'required',
        ];
    }
}
