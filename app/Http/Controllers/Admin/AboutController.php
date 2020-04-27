<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\About\AboutRequest;
use App\Models\About;

class AboutController extends Controller
{

    public function index()
    {
    	$about = About::find(1);
        return view('admin.about.index', compact('about'));
    }

    public function store(AboutRequest $request)
    {
    	$about = About::find(1);
        $about->update([
    		'body' =>  $request['body']
    	]);

    	return view('admin.about.index', compact('about'));
    }
}
