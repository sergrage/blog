<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactsRequest;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contacts::find(1);
    	return view('admin.contacts.index', compact('contacts'));
    }

    public function store(ContactsRequest $request)
    {
    	$contacts = Contacts::find(1);

    	if(!$contacts){
    		$contacts = Contacts::create([
	    		'body'  =>  $request['body'],
	            'adress' =>  'Москва, Тверская улица, дом 7',
	            'xCoordinate' => '37.611203',
	            'yCoordinate' => '55.757972',
    		]);
   		
    	} else{
    		$contacts->update([
	    		'body'  =>  $request['body'],
    		]);
    	}
    	return redirect()->route('admin.preview');
    }

    public function preview()
    {
        $contacts = Contacts::find(1);
        return view('admin.contacts.preview', compact('contacts'));
    }
}
