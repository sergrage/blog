<?php

Route::get('/', 'App\HomeController@index')->name('home');
Route::get('/posts', 'App\HomeController@allPosts')->name('posts');
Route::get('/posts/{slug}', 'App\HomeController@show')->name('post.show');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/comment/store', 'App\CommentsController@store')->name('commentStore');
Route::get('/posts/comment/refreshCaptcha', 'App\CommentsController@refreshCaptcha')->name('refreshCaptcha');
Route::get('/contacts', 'App\ContactsController@index')->name('contacts');
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
		Route::resource('/comments', 'CommentsController');
		Route::post('/comments/{comment}/unBan', 'CommentsController@unBan')->name('comments.unBan');
		Route::post('/comments/{comment}/ban', 'CommentsController@ban')->name('comments.ban');
		Route::post('/comments/answer', 'CommentsController@answer')->name('comments.answer');
		Route::resource('/tags', 'TagController');
		Route::resource('/about', 'AboutController');
		Route::post('/users/avatarUpload', 'AvatarUploadController@avatarUpload');
		Route::post('/posts/postImageUpload', 'AvatarUploadController@postImageUpload');
		Route::get('/contacts', 'ContactController@index')->name('contacts');
		Route::get('/watermark/{post}', 'WatermarkController@image')->name('watermark');
		Route::post('/watermark/addWatermark', 'WatermarkController@addWatermark')->name('addWatermark');
		Route::get('/contacts/preview', 'ContactController@preview')->name('preview');
		Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
		Route::get('/adress', 'AdressController@index')->name('adress');
		Route::post('/adress/store', 'AdressController@store')->name('adress.store');
});