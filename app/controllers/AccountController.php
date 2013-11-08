<?php

class AccountController extends AuthorizedController {

	/**
	 * User profile page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('modules.account.profile', compact('user'));
	}

	/**
	 * User profile form processing page.
	 *
	 * @return Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation
		$rules = array(
			'first_name' => 'required|min:3',
			'last_name'  => 'required|min:3',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Update the user information
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->save();

		// Redirect to the settings page
		return Redirect::route('profile')->with('success', Lang::get('modules/account/messages.success.profile'));
	}

	/**
	 * User change password page.
	 *
	 * @return View
	 */
	public function getChangePassword()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('modules.account.change-password', compact('user'));
	}

	/**
	 * User change password form processing page.
	 *
	 * @return Redirect
	 */
	protected function postChangePassword()
	{
		// Declare the rules for the form validation
		$rules = array(
			'old_password'     => 'required|between:3,32',
			'password'         => 'required|between:3,32',
			'password_confirm' => 'required|same:password',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Check the user current password
		if ( ! $user->checkPassword(Input::get('old_password')))
		{
			// Set the error message
			$this->messageBag->add('old_password', Lang::get('modules/account/messages.error.current_password_incorrect'));

			// Redirect to the change password page
			return Redirect::route('change-password')->withErrors($this->messageBag);
		}

		// Update the user password
		$user->password = Input::get('password');
		$user->save();

		// Redirect to the change-password page
		return Redirect::route('change-password')->with('success', Lang::get('modules/account/messages.success.password'));
	}

	/**
	 * User change email page.
	 *
	 * @return View
	 */
	public function getChangeEmail()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('modules.account.change-email', compact('user'));
	}

	/**
	 * Users change email form processing page.
	 *
	 * @return Redirect
	 */
	public function postChangeEmail()
	{
		// Declare the rules for the form validation
		$rules = array(
			'current_password' => 'required|between:3,32',
			'email'            => 'required|email|unique:users,email,'.Sentry::getUser()->email.',email',
			'email_confirm'    => 'required|same:email',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Check the user current password
		if ( ! $user->checkPassword(Input::get('current_password')))
		{
			// Set the error message
			$this->messageBag->add('current_password', Lang::get('modules/account/messages.error.current_password_incorrect'));

			// Redirect to the change email page
			return Redirect::route('change-email')->withErrors($this->messageBag);
		}

		// Update the user email
		$user->email = Input::get('email');
		$user->save();

		// Redirect to the settings page
		return Redirect::route('change-email')->with('success', Lang::get('modules/account/messages.success.password'));
	}

}