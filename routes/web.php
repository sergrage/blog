<?php

Route::get('/', 'App\HomeController@index')->name('home');
Route::get('/posts', 'App\HomeController@allPosts')->name('posts');
Route::get('/posts/{slug}', 'App\HomeController@show')->name('post.show');
Route::get('/portfolio', 'App\PortfolioController@allPortfolios')->name('portfolios');
Route::get('/portfolio/{id}', 'App\PortfolioController@portfolio')->name('portfolio');
Route::get('/tag/{tag}', 'App\HomeController@showByTag')->name('post.showByTag');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/questions', 'App\QuestionController@index')->name('questions');
Route::post('/questions/store', 'App\QuestionController@store')->name('questionStore');
Route::get('/reviews', 'App\ReviewController@index')->name('reviews');
Route::post('/reviews/store', 'App\ReviewController@store')->name('reviewStore');
Route::post('/comment/store', 'App\CommentsController@store')->name('commentStore');
Route::get('/posts/comment/refreshCaptcha', 'App\CommentsController@refreshCaptcha')->name('refreshCaptcha');
Route::get('/contacts', 'App\ContactsController@index')->name('contacts');
Route::get('/about', 'App\AboutController@index')->name('about');
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
		Route::resource('/portfolio', 'PortfolioController');
		Route::resource('/comments', 'CommentsController');
		Route::resource('/questions', 'QuestionController');
		Route::resource('/reviews', 'ReviewController');
		
		Route::post('/reviews/{review}/unBan', 'ReviewController@unBan')->name('reviews.unBan');
		Route::post('/reviews/{review}/ban', 'ReviewController@ban')->name('reviews.ban');
		
		Route::post('/questions/{question}/unBan', 'QuestionController@unBan')->name('questions.unBan');
		Route::post('/questions/{question}/ban', 'QuestionController@ban')->name('questions.ban');
		
		Route::post('/comments/{comment}/unBan', 'CommentsController@unBan')->name('comments.unBan');
		Route::post('/comments/{comment}/ban', 'CommentsController@ban')->name('comments.ban');
		Route::post('/comments/answer', 'CommentsController@answer')->name('comments.answer');
		
		Route::post('/posts/{post}/unBan', 'PostController@unBan')->name('posts.unBan');
		Route::post('/posts/{post}/ban', 'PostController@ban')->name('posts.ban');
		
		Route::post('/portfolio/{portfolio}/unBan', 'PortfolioController@unBan')->name('portfolio.unBan');
		Route::post('/portfolio/{portfolio}/ban', 'PortfolioController@ban')->name('portfolio.ban');
		
		Route::resource('/aboutUpload','AboutPhotoUploadController');

		Route::get('/portfolioUpload/{id}','PortfolioPhotoUploadController@addImage')->name('portfolioUpload');

		Route::resource('/tags', 'TagController');
		Route::resource('/portfolioUpload', 'PortfolioPhotoUploadController');
		Route::resource('/about', 'AboutController');
		Route::resource('/resume', 'ResumeController');
		

		Route::post('/users/avatarUpload', 'AvatarUploadController@avatarUpload');
		Route::post('/posts/postImageUpload', 'AvatarUploadController@postImageUpload');

		Route::get('/watermark/{post}', 'WatermarkController@image')->name('watermark');
		Route::post('/watermark/addWatermark', 'WatermarkController@addWatermark')->name('addWatermark');
		Route::post('/watermark/returnImage', 'WatermarkController@returnImage');

		Route::get('/watermark/portfolio/{portfolio}', 'WatermarkController@imagePortfolio')->name('watermarkPortfolio');
		Route::post('/watermark/portfolio/returnImagePortfolio', 'WatermarkController@returnImagePortfolio');

		Route::post('/watermark/portfolio/addWatermarkPortfolio', 'WatermarkController@addWatermarkPortfolio')->name('addWatermarkPortfolio');
		Route::post('/watermark/returnImage', 'WatermarkController@returnImage');

		Route::get('/contacts', 'ContactController@index')->name('contacts');
		Route::get('/contacts/preview', 'ContactController@preview')->name('preview');
		Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');

		Route::get('/adress', 'AdressController@index')->name('adress');
		Route::post('/adress/store', 'AdressController@store')->name('adress.store');

		Route::get('/portfolioImage/{portfolio}', 'PortfolioImageController@index')->name('portfolioImage');

});