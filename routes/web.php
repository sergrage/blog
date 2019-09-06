<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/administrator', 'Admin\HomeController@index')->name('admin');
Route::resource('/administrator/users', 'Admin\UserController');
Route::resource('/administrator/posts', 'Admin\PostController');
Route::post('/administrator/users/avatarUpload', 'Admin\AvatarUploadController@avatarUpload');
// Route::post('/administrator/posts/autosave', 'Admin\PostAutosaveController@autosave');
// Route::post('/search', 'Admin\SearchController@filter');

Route::get('/administrator/fetchData', 'Admin\SearchController@fetchData')->name('fetchData');
Route::get('/administrator/contacts', 'Admin\ContactController@index')->name('admin.contacts');
Route::get('/administrator/adress', 'Admin\ContactController@adress')->name('admin.adress');
Route::post('/administrator/contacts/store', 'Admin\ContactController@store')->name('admin.contacts.store');
Route::post('/administrator/adress/store', 'Admin\ContactController@adressStore')->name('admin.adress.store');