<?php

class BlogPostsController extends BaseController {

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->beforeFilter('admin-auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('modules.blog.posts.index')
			->with('blog_posts', BlogPost::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modules.blog.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$blog_post = new BlogPost;
		$blog_post->title   = Input::get('title');
		$blog_post->slug    = Str::slug(Input::get('title'));
		$blog_post->content = Input::get('body');
		$blog_post->user_id = Sentry::getUser()->id;
		$blog_post->save();
	 
		return Redirect::route('blog.show', $blog_post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		return View::make('modules.blog.posts.show')
			->with('blog_post', BlogPost::where('slug', $slug)->first());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('modules.blog.posts.edit');
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
