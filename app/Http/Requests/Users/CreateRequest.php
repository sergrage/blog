<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'  =>  'required|string|alpha_dash|max:255|min:6',
            'email' =>  'required|email|string|max:255|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
