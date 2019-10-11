<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
    	$reviews = Review::all();
        $reviewsProvenCount = Review::where('status', 'active')->count();
        return view('app.review', compact('reviews', 'reviewsProvenCount'));
    }

    public function store(Request $request)
    {

    	$request->validate([
    		'name' => 'required',
    		'review' => 'required',
    		'captcha' => 'required|captcha',
    	], ['captcha.captcha'=>'неправильно введен код проверки.']);

        $question = Review::create([
            'name'  =>  $request['name'],
            'text' =>  $request['review'],
            'status' => 'wait',
            'proven' => 0,
        ]);

        return redirect()->back()
                ->with('success', 'Ваш отзыв добавят после проверки.');
    }
}
