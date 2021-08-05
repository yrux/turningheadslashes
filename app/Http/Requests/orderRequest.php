<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'first_name.required'=>'First Name is required',
            'last_name.required'=>'Last Name is required',
            'country_id.required'=>'Country is required',
            'first_name.max'=>'First Name can not exceed length of 100',
            'last_name.max'=>'First Name can not exceed length of 100',
            'company_name.max'=>'Company Name can not exceed length of 100',
            'address_1.max'=>'Address 1 can not exceed length of 255',
            'address_1.required'=>'Address 1 is required',
            'address_2.max'=>'Address 2 can not exceed length of 255',
            'email.required'=>'Email is required',
            'email.max'=>'Email can not exceed length of 255',
            'email.email'=>'Email is invalid',
            'phone.required'=>'Phone# is required',
            'phone.max'=>'Phone can not exceed length of 20',
            'city.required'=>'City is required',
            'city.max'=>'City can not exceed length of 100',
        ];
    }
    public function rules()
    {
        return [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'country_id' => 'required',
            'company_name' => 'max:100',
            'address_1' => 'required|max:255',
            'address_2' => 'max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:20',
            'city' => 'required|max:100',
        ];
    }
}
