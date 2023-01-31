<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
        ];
    }

}
