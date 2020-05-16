<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function allPortfolios()
    {
    	$portfolios = Portfolio::where('public', 'on')->orderBy('created_at', 'desc')->get();
    	return view('app.portfolios', compact('portfolios'));
    }

    public function portfolio($id)
    {
    	$portfolio = Portfolio::find($id);
        $portfolio->increment('views');
    	return view('app.portfolio', compact('portfolio'));	
    }
}
