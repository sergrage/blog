<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Services\Post\PostService;

class PostController extends Controller
{

    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags =  Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    public function store(CreateRequest $request)
    {
        // создаем новую статью
        $post = $this->service->createPost($request);
        // создаем фото из статьи
        $this->service->createPostImages($request, $post);
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $tagsListId = [];

        if($post->tags->isNotEmpty()){
            $tagsListId = $post->tags->pluck('id')->toArray();
        }
        return view('admin.posts.edit', compact('post', 'tags', 'tagsListId'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $this->service->updatePost($request, $post);
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
