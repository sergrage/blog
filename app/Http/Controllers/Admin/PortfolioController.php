<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;

use App\Http\Requests\Portfolio\CreateRequest;
use App\Http\Requests\Portfolio\UpdateRequest;

class PortfolioController extends Controller
{
    public function index()
    {
    	$portfolios = Portfolio::all();
    	return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
    	return view('admin.portfolio.create');
    }

    public function store(CreateRequest $request)
    {
    	$portfolio = Portfolio::create([
    		'body' =>  $request['body'],
    		'title' => $request['title'],
    		'view' => 0,
    		'public' => 'off',
    		'textPreview' => $request['textPreview'],
    	]);

    	return redirect()->route('admin.portfolio.index');
    }

    public function edit(Portfolio $portfolio)
    {
    	return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
	     $portfolio->update([
            'body' =>  $request['body'],
            'title' => $request['title'],
            'public' => $request['public'] ? $request['public'] : 'off',
        ]);

        return redirect()->route('admin.portfolio.index');
    }

    public function destroy(Portfolio $portfolio)
    {
    	$portfolio->delete();
        return redirect()->route('admin.portfolio.index');
    }

    public function ban(Portfolio $portfolio)
    {
        $portfolio->update(['public' => 'off']);
        return redirect()->route('admin.portfolio.index');
    }    

    public function unBan(Portfolio $portfolio)
    {
        $portfolio->update(['public' => 'on' ]);
        return redirect()->route('admin.portfolio.index');
    }
}
