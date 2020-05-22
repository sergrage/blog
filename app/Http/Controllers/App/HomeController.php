<?php

namespace App\Http\Controllers\App;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('tags')->where('public', 'on')->orderBy('created_at', 'desc')->get()->take(5);
        // dd($posts);

        // $portfolios = Portfolio::where('public', 'on')->orderBy('created_at', 'desc')->get()->take(5);
        $content = $posts;
        // $content = $posts->merge($portfolios)->sortBy('created_at');
        // dd($content );
        // foreach($content as $item){
        //     dd(get_class($item));
        // }
        // dd($content);
        // $posts->load('tags');
        return view('app.home', compact('content'));
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
