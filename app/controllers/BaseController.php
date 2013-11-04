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

		if (Route::currentRouteName() != 'setLang') {
			if (Session::get('locale')) {
				App::setLocale(Session::get('locale'));
			}
			else {
				Session::put('locale', 'fr');
				App::setLocale('fr');
			}
		}

		View::share('locale', Session::get('locale') ? Session::get('locale') : App::getLocale());
		View::share('menu_pages', Schema::hasTable('pages') ? Page::where('draft', '0')->where('in_menu', '1')->where('lang', Session::get('locale'))->get(array('title', 'slug')) : null);
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
		Session::put('locale', $lang);
		return Redirect::back();
	}

}