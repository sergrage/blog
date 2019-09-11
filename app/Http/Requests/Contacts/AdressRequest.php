<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;


class AdressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'adress'  =>  'required|string|max:255|min:10',
        ];
    }
}
