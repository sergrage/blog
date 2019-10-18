<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Carbon\Carbon;

use App\Http\Requests\Questions\QuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function store(QuestionRequest $request)
    {
        $question = Question::findOrFail($request['id']);
        $question->update([
            'answer' => $request['answer'],
            'proven' => 1,
            'answered_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions.index');
    }

        public function ban(Question $question)
    {
        $question->update(['status' => $question::STATUS_WAIT]);
        return redirect()->route('admin.questions.index');
    }    

    public function unBan(Question $question)
    {
        $question->update([
            'status' => $question::STATUS_ACTIVE, 
            'proven' => 1,

        ]);
        return redirect()->route('admin.questions.index');
    }
}
