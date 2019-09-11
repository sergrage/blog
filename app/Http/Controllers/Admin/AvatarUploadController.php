<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AvatarUploadController extends Controller
{
    public function avatarUpload(Request $request)
    {
    	$data = $request['image'];
    	// разбивает строку по разделителю и выдает массив из частей
		$image_array = explode(",", $data);


		$data = base64_decode($image_array[1]);

		// Имя, путь, создание файла
		$imageName = 'avatar' . time() . '.jpg';
		$imagePath = 'storage/avatarUploads/' . $imageName;

		$resu = file_put_contents($imagePath, $data);

		// используя API TiniPng, уменьшается размер аватара
		// $result = Tinify::fromFile($imagePath);
		// $result->toFile($imagePath);

		// echo filesize($imagePath); - размер файла

		echo '<img src="/' . $imagePath .'" class="img-thumbnail" alt="avatar"/>';

		// путь к аватару сохранятся в БД
		// $user = Auth::user();

		// if($user->image){
		// 	unlink($user->image);
		// }

		// $user->update([
		// 	'image' => $imagePath,
		// ]);

		return "<input type='text' class='d-none' name='image' value='". $imagePath ."'>";
    }
}
