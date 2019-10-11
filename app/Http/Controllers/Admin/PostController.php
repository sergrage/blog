<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Image; 

class PostController extends Controller
{

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

    public function store(Request $request)
    {
       
        $tags_id = [];
       
        if($request->input('tags')) {
            foreach($request->input('tags') as $tagName) {
                $tag = Tag::where('name', $tagName)->first();
                $tags_id[] = $tag->id;
            }
        }

        $post = Post::create([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
            'image' => $request['image'],
            'imageAlt' => $request['imageAlt'],
            'textPreview' => $request['textPreview'],

        ]);

        // создаем фото из превью
        $image = Image::create([
                'post_id' => $post->id,
                'source' => $request['image'],
            ]);

        $post ->tags()->sync($tags_id);
 
        // здесь можно обработать фотки

        $html = $request['body'];
        preg_match_all('/<img[^>]+>/i',$html, $result);
        foreach( $result[0] as $img_tag) {
            preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i',$img_tag, $img);
            $image = Image::create([
                'post_id' => $post->id,
                'source' => $img[1][0]
            ]);
        }

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags =  Tag::all();
        $tagsListId = [];

        if($post->tags->isNotEmpty()){
            $tagsListId = $post->tags->pluck('id')->toArray();
        }
        return view('admin.posts.edit', compact('post', 'tags', 'tagsListId'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $tags_id = [];
       
        if($request->input('tags')) {
            foreach($request->input('tags') as $tagName) {
           $tag = Tag::where('name', $tagName)->first();
           $tags_id[] = $tag->id;
            }
        }
        
        $post ->tags()->sync($tags_id);
        $post->update([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
            'image' => $request['image'],
            'imageAlt' => $request['imageAlt'],
            'textPreview' => $request['textPreview'],
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
