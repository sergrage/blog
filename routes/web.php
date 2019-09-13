<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Auth::routes();

// Страница Админки
Route::group(
	[
        'prefix' => 'administrator',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('admin');
		Route::resource('/users', 'UserController');
		Route::resource('/posts', 'PostController');
		Route::resource('/tags', 'TagController');
		Route::post('/users/avatarUpload', 'AvatarUploadController@avatarUpload');
		Route::post('/posts/postImageUpload', 'AvatarUploadController@postImageUpload');
		Route::get('/contacts', 'ContactController@index')->name('contacts');
		Route::get('/contacts/preview', 'ContactController@preview')->name('preview');
		Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
		Route::get('/adress', 'AdressController@index')->name('adress');
		Route::post('/adress/store', 'AdressController@store')->name('adress.store');
});