<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'text' => 'required|max:191',
            'user' => 'required',
            'topics' => 'required'
        ]; 
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'max' => 'A :attribute is :max characters max.'
        ];
    }
}
