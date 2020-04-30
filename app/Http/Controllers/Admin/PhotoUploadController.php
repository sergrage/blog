<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\About;
use App\Models\Photo;

class PhotoUploadController extends Controller
{
	public function index()
	{
		$about = About::find(1);
		return view('admin.imageUpload.index', compact('about'));	
	}

    public function store(Request $request)
    {

    	$about = About::find(1);
    	$images = $request->file('file');

    	foreach($images as $image) {
    	 	$newName = rand(). '.' . $image->getClientOriginalExtension();
    	 	$image->move(public_path('storage/images'), $newName);
    	 	$path = '/storage/images/' . $newName;
    	 	$photo = new Photo;
    	 	$photo->path = $path;
    	 	$about->photos()->save($photo); 
    	}

    	// dd('123');

    	// foreach($images as $image){
    	// 	$newName = rand(). '.' . $image->getClientOriginaleExtension();
    	// 	$image->move(public_path('images'), $newName);
    	// 	$imageCode .= '<div class="col-md-3 mb-3"><img src="/images/' . $newName . '" class="img-thumbnail"/></div>';
    	// }

    	// $output = array(
    	// 	'success' => 'Фотографии загружены успешно',
    	// 	'image' => $imageCode
    	// );

    	return redirect()->route('admin.imageUpload.index');
    }
}
