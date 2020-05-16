<?php

namespace App\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required',
            'file.*' => 'image|mimes:jpg,jpeg,png|max:2000'
        ];
    }
}
