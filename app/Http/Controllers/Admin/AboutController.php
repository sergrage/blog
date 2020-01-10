<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\About\AboutRequest;

class AboutController extends Controller
{

    public function index()
    {
        return view('admin.about.index');
    }

    public function store(AboutRequest $request)
    {
    	// dd($request);
    }
}
