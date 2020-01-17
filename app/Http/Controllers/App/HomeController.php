<?php

namespace App\Http\Controllers\App;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('tags')->where('public', 'on')->orderBy('created_at', 'desc')->get()->take(5);
        // $posts->load('tags');
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
    	$posts = Post::with('tags')->where('public', 'on')->orderBy('created_at', 'desc')->get();
        return view('app.posts', compact('posts'));
    }

    public function showByTag($tag)
    {
        $t = Tag::where('name', $tag)->get();
        // $t = DB::table('tags')->where('name', $tag)->first();
        $posts = $t[0]->posts->where('public', 'on');
        
        return view('app.posts', compact('posts'));

    }
}
