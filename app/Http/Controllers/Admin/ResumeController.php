<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Resume;

class ResumeController extends Controller
{
        public function index()
    {
    	$about = Resume::find(1);
        return view('admin.Resume.index', compact('Resume'));
    }

    public function store(AboutRequest $request)
    {
    	$resume = About::create([
    		'body' =>  $request['body'],
    		'view' => 0,
    	]);

    	return view('admin.Resume.index', compact('Resume'));
    }
}
