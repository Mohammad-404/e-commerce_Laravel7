<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'logo'          => 'required_without:id|mimes:png,jpg,jpeg',
            'mobile'        => 'required|min:10|numeric|regex:/(0)[0-9]{9}/|unique:vendors,mobile,'.$this->id,
            'name'          => 'required|max:140',
            'email'         => 'required|email|unique:vendors,email,'.$this->id,
            'address'       => 'required|max:500',
            'category_id'   => 'required|exists:main_categories,id',
            'password'      => 'required_without:id',
        ];
    }

    public function messages(){
        return [
            'mobile.regex'          => 'Start Number 0 or 1 !!',
            'email.unique'          => 'email is used !!',
            'mobile.unique'         => 'mobile is used !!',
            'mobile.min'            => '10 Numbers !!',
            'required'              => 'The Feild Is Required',
            'category_id.exists'    => 'The Category is not found !! ',
            'email.email'           => 'type text is not email !!',
            'logo.required_without' => 'image is required',
            'password.min'          => 'Password Min 6 Characters !!'
        ];
    }
}
