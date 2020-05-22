<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Photo;

use App\Http\Requests\Portfolio\UploadRequest;

class PortfolioPhotoUploadController extends Controller
{
    public function addImage($id)
	{
		$portfolio = Portfolio::find($id);
		return view('admin.portfolioImageUpload.index', compact('portfolio'));	
	}

    public function update(Request $request, $photo)
    {
       $photo = Photo::find($photo);
       $id = $request['id'];
       $photo->update([ 'alt'  =>  $request['alt'], ]); 
       return redirect()->route('admin.portfolioUpload', compact('id'));
    }

    public function store(UploadRequest $request)
    {

    	$id = $request['id'];
    	$portfolio = Portfolio::find($request['id']);
    	$images = $request->file('file');

        foreach($images as $image) {
            $newName = rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $newName);
            $path = '/storage/images/' . $newName;
            $photo = new Photo;
            $photo->path = $path;
            $portfolio->photos()->save($photo); 
        }
       	return redirect()->route('admin.portfolioUpload', compact('id'));
    }

    public function destroy($photo)
    {
        $photoId = $photo;
        $photo = Photo::find($photoId);
        $id = $photo->imageable_id;
        $pth = substr($photo->path, 1);
        unlink($pth);
        $photo->delete();
        return redirect()->route('admin.portfolioUpload', compact('id'));
    }
}
