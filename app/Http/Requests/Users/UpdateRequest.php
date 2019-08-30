<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required|string|alpha_dash|max:255|min:6',
            'email' => ['required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore(request('user'))],
         ];
    }
}
