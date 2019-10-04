<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contacts;;

class ContactsController extends Controller
{
    public function index()
    {
    	$contacts = Contacts::find(1);
    	return view('app.contacts', compact('contacts'));
    }
}
