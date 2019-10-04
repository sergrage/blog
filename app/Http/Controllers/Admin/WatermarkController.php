<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image;
use Intervention\Image\ImageManagerStatic as InterventionImage; 

class WatermarkController extends Controller
{
    public function image(Post $post)
    {
    	return view('admin.watermark.index', compact('post'));
    }

    public function addWatermark(Request $request)
    {
    	$postId = $request['post_id'];
    	$post = Post::find($postId);
    	
    	$images = $request['images'];
    	// Удаляем пробелы
    	$images = preg_replace('/\s+/', '', $images);
    	// делим по разделителю и формируем массив
    	$myArray = explode(',', $images);
    	
    	$imgSource = Image::find($myArray[0])->source;
    	$imgSource= substr($imgSource, 1); 

    	$img = InterventionImage::make($imgSource);
	    /* insert watermark at bottom-right corner with 10px offset */

	    $img->insert('logo2.png', 'top-right', 10, 10);

	    $img->save( $imgSource);
	    return redirect()->route('admin.watermark', $post); 
   
    }
}
