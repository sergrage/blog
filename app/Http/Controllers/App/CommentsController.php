<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    	$request->validation([
    		'name' => 'required',
    		'comment' => 'required',
    		'captcha' => 'required|captcha',
    	], ['captcha.captcha'=>'еправильно введен код проверки.']);
    }

    public function refreshCaptcha()
    {
    	return response()->json(['captcha'=>captcha_img()]);
    }
}
