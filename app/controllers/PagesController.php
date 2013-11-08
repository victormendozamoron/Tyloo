<?php

class PagesController extends BaseController {

	protected $pages;

	public function __construct(Page $pages) {
		// We need to be logged in as an Admin to access certain methods
		$this->beforeFilter('admin-auth', array('except' => array('show')));

		// We load the Page model
		$this->pages = $pages;

		// We call the BaseController constructor
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->pages->all();
        return View::make('modules.pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('modules.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// We get the form datas
		$input = Input::all();
		$input['user_id'] = Sentry::getId();

		// Validation setup
		$v = Validator::make(Input::all(), Page::$rules);

		// If validation fails
		if ($v->fails())
		{
		    return Redirect::route('pages.create')
		        ->withInput()
		        ->withErrors($v->messages());
		}

		$this->pages->create($input);

		return Redirect::route('pages.index')
		    ->with('flash', 'Your post has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug = '')
	{
		// Check if the page exists
		if (is_null($page = $this->pages->where('slug', $slug)->first()))
		{
			// Put a 404 in ur face, yo !
			return App::abort(404);
		}

		return View::make('modules.pages.show')->with('page', $page);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('modules.pages.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
