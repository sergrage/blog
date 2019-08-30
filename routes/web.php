<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/administrator', 'Admin\HomeController@index')->name('admin');
Route::resource('/administrator/users', 'Admin\UserController');
Route::resource('/administrator/posts', 'Admin\PostController');
Route::post('/administrator/users/avatarUpload', 'Admin\AvatarUploadController@avatarUpload');
Route::post('/administrator/posts/autosave', 'Admin\PostAutosaveController@autosave');