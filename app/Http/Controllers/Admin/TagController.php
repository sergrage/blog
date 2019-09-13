<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
    	$tags = Tag::all();
    	return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
    	$tag = Tag::create([
            'name'  =>  $request['name'],
       ]);

    	return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {
    	dd(123);
    }

    public function update(Request $request, Tag $tag)
    {
    	$tag->update([
            'name'  =>  $request['name'],
       ]);

    	return redirect()->route('admin.tags.index');
    }


    public function destroy(Tag $tag)
    {
    	$tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
