<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
    	$about = About::find(1);
    	return view('app.about', compact('about'));
    }
}
