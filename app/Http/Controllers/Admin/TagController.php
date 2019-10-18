<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

use App\Http\Requests\Tags\CreateRequest;
use App\Http\Requests\Tags\UpdateRequest;

class TagController extends Controller
{
    public function index()
    {
    	$tags = Tag::all();
    	return view('admin.tags.index', compact('tags'));
    }

    public function store(CreateRequest $request)
    {
    	$tag = Tag::create([ 'name'  =>  $request['name'], ]);
    	return redirect()->route('admin.tags.index');
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        // dd($request);
    	$tag->update([ 'name'  =>  $request['name'], ]);
    	return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag)
    {
    	$tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
