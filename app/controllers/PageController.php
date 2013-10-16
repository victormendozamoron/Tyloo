<?php

class PageController extends BaseController {

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->beforeFilter('admin-auth', array('except' => array('show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();
		return View::make('modules.page.index', compact('pages'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		return View::make('modules.page.show')
			->with('page', Page::where('slug', $slug)->first());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modules.page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			'content' => 'required|min:3|not_in:<p></p>',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new page
		$page = new Page;

		// Update the page data
		$page->title            = e(Input::get('title'));
		if (empty($page->slug))
			$page->slug         = e(Str::slug(Input::get('title')));
		else
			$page->slug         = e(Str::slug(Input::get('slug')));
		$page->content          = e(Input::get('content'));
		$page->draft            = e(Input::get('draft'));
		$page->in_menu          = e(Input::get('in_menu'));
		$page->lang             = e(Input::get('lang'));
		$page->content          = e(Input::get('content'));
		$page->meta_title       = e(Input::get('meta-title'));
		$page->meta_description = e(Input::get('meta-description'));
		$page->meta_keywords    = e(Input::get('meta-keywords'));
		$page->user_id          = Sentry::getId();

		// Was the page created?
		if($page->save())
		{
			// Redirect to the new page page
			return Redirect::route('page.show', array('slug' => $page->slug))->with('success', Lang::get('page/message.create.success'));
		}

		// Redirect to the page create page
		return Redirect::route('page.create')->with('error', Lang::get('page/message.create.error'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::find($id);
		return View::make('modules.page.edit', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			'content' => 'required|min:3|not_in:<p></p>',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Get the page data
		$page = Page::find($id);

		// Update the page data
		$page->title            = e(Input::get('title'));
		if (empty($page->slug))
			$page->slug         = e(Str::slug(Input::get('title')));
		else
			$page->slug         = e(Str::slug(Input::get('slug')));
		$page->content          = e(Input::get('content'));
		$page->draft            = e(Input::get('draft'));
		$page->in_menu          = e(Input::get('in_menu'));
		$page->lang             = e(Input::get('lang'));
		$page->content          = e(Input::get('content'));
		$page->meta_title       = e(Input::get('meta-title'));
		$page->meta_description = e(Input::get('meta-description'));
		$page->meta_keywords    = e(Input::get('meta-keywords'));

		// Was the page created?
		if($page->save())
		{
			// Redirect to the new page page
			return Redirect::route('page.show', array('slug' => $page->slug))->with('success', Lang::get('page/message.edit.success'));
		}

		// Redirect to the pagecreate page
		return Redirect::route('page.create')->with('error', Lang::get('page/message.edit.error'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Check if the page exists
		if (is_null($page = Page::find($id)))
		{
			// Redirect to Page management page
			return Redirect::to('page.index')->with('error', Lang::get('page/message.not_found'));
		}

		// Delete the page
		$page->delete();

		// Redirect to the Page management page
		return Redirect::to('page.index')->with('success', Lang::get('page/message.delete.success'));
	}

	/**
	 * Publish or UnPublish a Page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($id, $state)
	{
		// Get the page data
		if (is_null($page = Page::find($id)))
		{
			// Redirect to Page management page
			return Redirect::to('page.index')->with('error', Lang::get('page/message.not_found'));
		}

		$page->draft = $state;

		// Was the page created?
		if($page->save())
		{
			// Redirect to the new page page
			return Redirect::route('page.index')->with('success', Lang::get('page/message.edit.success'));
		}

		// Redirect to the pagecreate page
		return Redirect::route('page.index')->with('error', Lang::get('page/message.publish.error'));
	}

	/**
	 * Set the Page in the top menu or not.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function inMenu($id, $state)
	{
		// Get the page data
		if (is_null($page = Page::find($id)))
		{
			// Redirect to Page management page
			return Redirect::to('page.index')->with('error', Lang::get('page/message.not_found'));
		}

		$page->in_menu = $state;

		// Was the page created?
		if($page->save())
		{
			// Redirect to the new page page
			return Redirect::route('page.index')->with('success', Lang::get('page/message.edit.success'));
		}

		// Redirect to the pagecreate page
		return Redirect::route('page.index')->with('error', Lang::get('page/message.in_menu.error'));
	}

}