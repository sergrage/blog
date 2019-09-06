<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contacts::find(1);
    	return view('admin.contacts.index', compact('contacts'));
    }

    public function store(Request $request)
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
    	return redirect()->route('admin.contacts');
    }

    public function adress()
    {
    	$contacts = Contacts::find(1);

    	if(!$contacts) {
    		$contacts = new Contacts;
    		$contacts->adress = 'Москва, Тверская улица, дом 7';
    		$contacts->yCoordinate = '55.757972';
    		$contacts->xCoordinate = '37.611203';
    	}

    	return view('admin.contacts.adress', compact('contacts'));
    }

    public function adressStore(Request $request)
    {
    	$adress = $request['adress'];
    	$adress = str_replace(" ", "+", $adress);

    	$response = file_get_contents('https://geocode-maps.yandex.ru/1.x/?apikey=eed57dc7-6c93-46bb-8d26-4de377ef81fd&geocode=' . $adress);
		$xml = simplexml_load_string($response);
		$pos = $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos;
		$posString =(string)$pos;
		$posArr = explode(' ', $posString);

		$contacts = Contacts::find(1);

    	if(!$contacts){
    		$contacts = Contacts::create([
	    		'body'  =>  '',
	            'adress' =>  $request['adress'],
	            'xCoordinate' => $posArr[0],
	            'yCoordinate' => $posArr[1],
    		]);
   		
    	} else{
    		$contacts->update([
	    		'public' => $request['adress'],
		        'xCoordinate' => $posArr[0],
	   	   		'yCoordinate' => $posArr[1],
    		]);
    	}
    	return redirect()->route('admin.adress');
    }
}
