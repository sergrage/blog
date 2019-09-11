<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

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
		Route::post('/users/avatarUpload', 'AvatarUploadController@avatarUpload');
		Route::get('/contacts', 'ContactController@index')->name('contacts');
		Route::get('/contacts/preview', 'ContactController@preview')->name('preview');
		Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
		Route::get('/adress', 'AdressController@index')->name('adress');
		Route::post('/adress/store', 'AdressController@store')->name('adress.store');
});