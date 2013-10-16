<?php

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

View::share('menu_pages', Page::where('in_menu', '=', 1)->get(array('title', 'slug')));

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
	Route::get('/', array('as' => 'account', 'uses' => 'AccountDashboardController@getIndex'));

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'AccountProfileController@getIndex'));
	Route::post('profile', 'AccountProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'AccountChangePasswordController@getIndex'));
	Route::post('change-password', 'AccountChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'AccountChangeEmailController@getIndex'));
	Route::post('change-email', 'AccountChangeEmailController@postIndex');

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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('blog/cats.json', function()
{
    return BlogTag::all()->lists('name');
});
Route::resource('blog', 'BlogController');
Route::resource('portfolio', 'PortfolioController');

Route::get('contact', array('as' => 'contact', 'uses' => 'ContactController@getIndex'));
Route::post('contact', 'ContactController@postIndex');

Route::get('{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
Route::get('page/create', array('as' => 'page.create', 'uses' => 'PageController@create'));
Route::post('page/create', array('as' => 'page.store', 'uses' => 'PageController@store'));
Route::get('page/edit/{id}', array('as' => 'page.edit', 'uses' => 'PageController@edit'));
Route::post('page/edit/{id}', array('as' => 'page.update', 'uses' => 'PageController@update'));