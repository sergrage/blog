<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;

use App\Http\Requests\Comments\AnswerRequest;

class CommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function store(AnswerRequest $request)
    {
        $comment = Comment::findOrFail($request['id']);
        $comment->update([
            'answer' => $request['answer'],
            'proven' => 1,
            'answered_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }

    public function ban(Comment $comment)
    {
        $comment->update(['status' => $comment::STATUS_WAIT]);
        return redirect()->route('admin.comments.index');
    }    

    public function unBan(Comment $comment)
    {
        $comment->update([
            'status' => $comment::STATUS_ACTIVE, 
            'proven' => 1,

        ]);
        return redirect()->route('admin.comments.index');
    }

}
