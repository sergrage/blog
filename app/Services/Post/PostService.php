<?php

namespace App\Services\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Models\Tag;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;


class PostService
{
	public function createPostImages(Request $request, Post $post){
		$html = $request['body'];
		// создаем фото из превью
        $image = Image::create([
                'post_id' => $post->id,
                'source' => $request['image'],
            ]);
        // создаем фото из статьи
        preg_match_all('/<img[^>]+>/i',$html, $result);
        foreach( $result[0] as $img_tag) {
            preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i',$img_tag, $img);
            $image = Image::create([
                'post_id' => $post->id,
                'source' => $img[1][0]
            ]);
        }
	}

	public function createPost(CreateRequest $request)
	{
		$tags_id = $this->tagsIds($request);

        $post = Post::create([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
            'image' => $request['image'],
            'imageAlt' => $request['imageAlt'],
            'textPreview' => $request['textPreview'],
        ]);

        $post->tags()->sync($tags_id);

        return $post;
	}

	public function updatePost(UpdateRequest $request, Post $post)
	{
		$tags_id = $this->tagsIds($request);
        
        $post ->tags()->sync($tags_id);
        
        $post->update([
            'title'  =>  $request['title'],
            'body' =>  $request['body'],
            'public' => $request['public'] ? $request['public'] : 'off',
            'image' => $request['image'],
            'imageAlt' => $request['imageAlt'],
            'textPreview' => $request['textPreview'],
        ]);
	}

	public function tagsIds($request)
	{
		$tags_id = [];
       
        if($request->input('tags')) {
            foreach($request->input('tags') as $tagName) {
	           $tag = Tag::where('name', $tagName)->first();
	           $tags_id[] = $tag->id;
            }
        }
        return $tags_id;
	}

}