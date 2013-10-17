<?php

class BaseController extends Controller {

	/**
	 * Message bag.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messageBag = null;

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// CSRF Protection
		$this->beforeFilter('csrf', array('on' => 'post'));

		// Initialization of the MessageBag
		$this->messageBag = new Illuminate\Support\MessageBag;

		if ( ! Session::has('user_lang')) {
			$user_lang = Session::get('user_lang');
			$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
			if ($lang != 'fr' && $lang != 'en') { $lang = 'en'; }

			Session::put('user_lang', $lang);
		}
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Setup the Locale of the Application.
	 *
	 * @return Redirect Previous Page
	 */
	public function setLocale($lang) {
		Session::put('user_lang', $lang);
		return Redirect::back();
	}

}