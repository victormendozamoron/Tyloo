<?php

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
Route::resource('blog', 'BlogpostsController');

Route::resource('portfolio', 'PortfoliopostsController');

Route::group(['prefix' => 'pages'], function() {
	Route::get('{id}/publish', ['as' => 'pages.publish', 'uses' => 'PagesController@publish']);
	Route::get('{id}/unpublish', ['as' => 'pages.unpublish', 'uses' => 'PagesController@unpublish']);
	Route::get('{id}/destroy', ['as' => 'pages.destroy', 'uses' => 'PagesController@destroy']);
});
Route::resource('pages', 'PagesController', ['except' => ['destroy']]);
Route::get('{slug?}', ['as' => 'pages.show', 'uses' => 'PagesController@show']);
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@show']);