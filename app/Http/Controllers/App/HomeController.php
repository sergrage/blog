<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('created_at', 'desc')->get()->take(5);
        return view('app.home', compact('posts'));
    }

    public function show($slug)
    {
    	$post = Post::where('slug', $slug)->firstOrFail();
    	$post->increment('views');
		// dd($post->comments->isEmpty());
		return view('app.show', compact('post'));
    }
    public function allPosts()
    {
    	$posts = Post::all();
        return view('app.posts', compact('posts'));
    }
}
