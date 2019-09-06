<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class SearchController extends Controller
{
    public function filter(Request $request, Post $post)
    {
    	# code...
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
                $query = $request->get('query');


                $query = str_replace(" ", "%", $query);

                $posts = Post::where('id', 'like', '%'.$query.'%')
                        ->orWhere('title', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(3);
                        // dd($posts);
                $isEmpty = $posts->isEmpty();        	
            return view('admin.partials._pagination_data', compact('posts', 'isEmpty'))->render();
        }
    }
}

                // $posts = Post::where('id', 'like', '%'.$query.'%')
                //         ->orWhere('title', 'like', '%'.$query.'%')
                //         ->orWhere('body', 'like', '%'.$query.'%')
                //         ->orderBy($sort_by, $sort_type)
                //         ->paginate(3);