<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class languageRequest extends FormRequest
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
            'abbr'              => 'required|string|max:10',
            'name'              => 'required|string|max:100',
            'direction'         => 'required|in:rtl,ltr',
            // 'active'            => 'required|in:1',
        ];
    }


    public function messages()
    {
        return [
            'required'                  => 'The Fild Is Required',
            'name.max'                  => 'The Char More 100 Character',
            'abbr.max'                  => 'The Char More 10 Character',
            'abbr.string'               => 'You Must Write String',
            'name.string'               => 'You Must Write String',
            'in'                        => 'The Value Is Not Correct',
        ];
    }
}
