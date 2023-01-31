<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'street' => 'required',
            'number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
        ];
    }

}
