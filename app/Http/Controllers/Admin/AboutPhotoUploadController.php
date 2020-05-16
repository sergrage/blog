<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\About\UploadRequest; 

use App\Models\About;
use App\Models\Photo;

class AboutPhotoUploadController extends Controller
{
	public function index()
	{
		$about = About::find(1);
		return view('admin.aboutImageUpload.index', compact('about'));	
	}

    public function store(UploadRequest $request)
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
       	return redirect()->route('admin.aboutUpload.index');
    }

    public function destroy($photo)
    {
        $id = $photo;
        $photo = Photo::find($id);
        $pth = substr($photo->path, 1);
        unlink($pth);
        $photo->delete();
        return redirect()->route('admin.aboutUpload.index');
    }
}
