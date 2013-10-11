<?php

class ContactController extends BaseController {

	public function getIndex()
	{
		return View::make('modules.contact.index');
	}

	public function postIndex()
	{
		// Declare the rules for the form validation
		$rules = array(
			'name'     => 'required|min:3',
			'email'    => 'required|email',
			'content'  => 'required|min:3',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails()) {
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else {
			$data = array(
				'name'    => e(Input::get('name')),
				'email'   => e(Input::get('email')),
				'content' => e(Input::get('content')),	
			);

			// Send the activation code through email
			Mail::send('emails.contact', $data, function($m) {
				$m->to(Config::get('app.admin.email'), Config::get('app.admin.name'));
				$m->subject('[Tyloo.fr] Contact Request');
				$m->replyTo(e(Input::get('email')), e(Input::get('name')));
			});

			// Redirect to the register page
			return Redirect::back()->with('success', Lang::get('auth/message.contact.success'));
		}
	}

}