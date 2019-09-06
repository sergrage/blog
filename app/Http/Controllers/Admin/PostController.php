<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::paginate(3);
        $posts = Post::latest()->paginate(3);
        $links = '';
        $isEmpty = $posts->isEmpty();
        return view('admin.posts.index', compact('posts', 'isEmpty'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(CreateRequest $request)
    {
       $post = Post::create([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
       ]);

       // здесь можно обработать фотки

       return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post->update([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
