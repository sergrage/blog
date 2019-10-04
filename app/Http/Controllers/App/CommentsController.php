<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'comment' => 'required',
    		'captcha' => 'required|captcha',
    	], ['captcha.captcha'=>'неправильно введен код проверки.']);

        $comment = Comment::create([
            'name'  =>  $request['name'],
            'text' =>  $request['comment'],
            'status' => 'wait',
            'post_id' => $request['post_id'],
            'proven' => 0,
        ]);

        return redirect()->back()
                ->with('success', 'Ваш комментарий добавят после проверки.');
    }

    public function refreshCaptcha()
    {
    	return response()->json(['captcha'=>captcha_img()]);
    }
}
