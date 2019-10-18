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
    	$posX = $request['positionX'];
    	$posY= $request['positionY'];
        $size = $request['size'];
    	$opacity = $request['opacity'];

    	$imageId = $request['images'];

    	// для редиректа на предыдущую страницу
    	$post = Post::find($postId);
    	
        // путь к img    
    	$imgSource = Image::find($imageId)->source;
    	$imgSource= substr($imgSource, 1);
        // путь к logo
    	$logoSource = 'logo2.png';
        // создаем объект img / logo
        $img = InterventionImage::make($imgSource);

    	$logo = InterventionImage::make($logoSource)->opacity($opacity * 100);
        // изменение размера logo
    	$logo->resize($size , null, function ($constraint) {
		    $constraint->aspectRatio();
		});
		// $logo->colorize(-100, -100, -100);
        // сохраняем измененное logo
		$logo->save('logoTest.png');
        // накладываем logo на img
	    $img->insert('logoTest.png', 'top-left', $posX, $posY);
        // сохраняем img
	    $img->save($imgSource);
        // удаляем измененное logo
	    $logo->destroy();

	    return redirect()->route('admin.watermark', $post); 
   
    }

    public function returnImage(Request $request)
    {
    	$imageId = $request['imageId'];
    	$imgSource = Image::find($imageId);
    	return '<img class="mx-auto d-block originalImg" src="' . $imgSource->source .'?'.time().'"><img draggable="true" class="position-absolute logoImg" style="top:0; left:0; cursor:move" src="/logo2.png">';
    }
}
