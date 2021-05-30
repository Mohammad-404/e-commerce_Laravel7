<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //change dalse to true
    }

    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'            => 'required|email',
            'password'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'         => 'The Fild Is Required',
            'password.required'      => 'The Fild Is Required',
        ];
    }

        // $Message    = $this->getMessage();
        // $Rules      = $this->getRules();
        // $validator  = Validator::make($request->all(),$Rules,$Message);
        // if($validator -> fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // } 

    
}
