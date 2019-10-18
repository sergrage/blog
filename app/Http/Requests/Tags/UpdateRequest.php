<?php

namespace App\Http\Requests\Tags;

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
        // return [
        //     'answer'  =>  ['required',
        //                     Rule::unique('tags')->ignore(request('tag'))
        //                 ],
        // ];

                return [
            'name'  =>  ['required',  Rule::unique('tags')->ignore(request('name'))],
        ];
    }
}
