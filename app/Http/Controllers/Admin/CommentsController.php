<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

use App\Http\Requests\Comments\AnswerRequest;

class CommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();

        $newComments = Comment::where('proven', 0)->count();
        return view('admin.comments.index', compact('comments', 'newComments'));
    }

    public function create()
    {
        //
    }

    public function store(AnswerRequest $request)
    {
        $comment = Comment::findOrFail($request['id']);
        $comment->update([
            'answer' => $request['answer'],
            'proven' => 1,
        ]);

        return redirect()->route('admin.comments.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
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

    public function answer(Request $request)
    {
        dd($request);
    }
}
