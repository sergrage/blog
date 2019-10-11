<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
    	$questions = Question::all();
        $questionsProvenCount = Question::where('status', 'active')->count();
        return view('app.question', compact('questions', 'questionsProvenCount'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'question' => 'required',
    		'captcha' => 'required|captcha',
    	], ['captcha.captcha'=>'неправильно введен код проверки.']);

        $question = Question::create([
            'name'  =>  $request['name'],
            'text' =>  $request['question'],
            'status' => 'wait',
            'proven' => 0,
        ]);

        return redirect()->back()
                ->with('success', 'Ваш вопрос добавят после проверки.');
    }


}
