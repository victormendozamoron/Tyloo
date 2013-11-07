<?php

Route::groupLocale(array(), function() {
	// Blog
	Route::group(array('prefix' => 'blog'), function()
	{
		Route::get('/', array('as' => 'blog.index', 'uses' => 'BlogController@getIndex'));
		Route::get('admin', array('as' => 'blog.admin', 'uses' => 'BlogController@getAdmin'));
		Route::get('tag/{slug}', array('as' => 'blog.postsByTag', 'uses' => 'BlogController@getPostsByTag'));
		Route::get('create', array('as' => 'blog.create', 'uses' => 'BlogController@getCreate'));
		Route::post('store', array('as' => 'blog.store', 'uses' => 'BlogController@postCreate'));
		Route::get('{id}/edit', array('as' => 'blog.edit', 'uses' => 'BlogController@getEdit'));
		Route::post('{id}/edit', array('as' => 'blog.edit.post', 'uses' => 'BlogController@postEdit'));
		Route::get('{id}/delete', array('as' => 'blog.destroy', 'uses' => 'BlogController@getDestroy'));
		Route::get('{slug}', array('as' => 'blog.show', 'uses' => 'BlogController@getShow'));
		/*
		Route::get('{id}/delete', array('as' => 'blog.delete', 'uses' => 'BlogController@destroy'));
		Route::get('{id}/publish/{state}', array('as' => 'blog.publish', 'uses' => 'BlogController@publish'));
		Route::get('cats.json', function()
		{
		    return BlogTag::all()->lists('name');
		});*/
	});
});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
	Route::post('login', 'AuthController@postLogin');

	# Register
	Route::get('register', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
	Route::post('register', 'AuthController@postRegister');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmatio	n
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'AccountController@getIndex'));
	Route::post('/', 'AccountController@postIndex');

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'AccountController@getIndex'));
	Route::post('profile', 'AccountController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'AccountController@getChangePassword'));
	Route::post('change-password', 'AccountController@postChangePassword');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'AccountController@getChangeEmail'));
	Route::post('change-email', 'AccountController@postChangeEmail');

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('as' => 'home', 'uses' => 'PageController@show'));

// Portfolio
Route::group(array('prefix' => 'portfolio'), function()
{
	Route::get('admin', array('as' => 'portfolio.admin', 'uses' => 'PortfolioController@admin'));
	Route::get('{id}/delete', array('as' => 'portfolio.delete', 'uses' => 'PortfolioController@destroy'));
	Route::get('{id}/publish/{state}', array('as' => 'portfolio.publish', 'uses' => 'PortfolioController@publish'));
	Route::get('cats.json', function()
	{
	    return PortfolioTag::all()->lists('name');
	});
});
Route::resource('portfolio', 'PortfolioController');

// Contact
Route::get('contact', array('as' => 'contact', 'uses' => 'ContactController@getIndex'));
Route::post('contact', 'ContactController@postIndex');

// Page
Route::get('page/{id}/publish/{state}', array('as' => 'page.publish', 'uses' => 'PageController@publish'));
Route::get('page/{id}/inMenu/{state}', array('as' => 'page.inMenu', 'uses' => 'PageController@inMenu'));
Route::resource('page', 'PageController');

// Page Display
Route::get('{slug?}', array('as' => 'page.show', 'uses' => 'PageController@show'));

// Set Locale
Route::get('lang/{lang}', array('as' => 'setLang', 'uses' => 'BaseController@setLocale'));